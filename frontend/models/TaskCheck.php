<?php

namespace frontend\models;

use common\models\Module;
use common\models\Task;
use common\models\User;
use common\models\UserTask;
use yii\base\Model;
class TaskCheck extends Model
{
    public $id;
    public $answer;
    public $correctAnswer;
    public $task;
    public $module;


    public function rules()
    {
        return [
            [['answer', 'id'], 'required'],
        ];
    }

    /**
     * @return bool
     */
    private function isAnswerCorrect(){
        if (in_array($this->task->type, [Task::TYPE_TEST, Task::TYPE_TEST_IMG])){
            if ($this->correctAnswer->id == intval($this->answer)){
                return true;
            }
        }else if ($this->task->type == Task::TYPE_TEST_CLOSE){
            if ($this->correctAnswer->name == $this->answer){
                return true;
            }
        }
        return false;
    }

    /**
     * @return array
     */
    public function check(){
        $this->task = Task::findOne($this->id);
        $user = User::findOne(\Yii::$app->user->identity->getId());
        $module = Module::findOne($this->module);
        if ($this->task){
            $this->correctAnswer = $this->task->getCorrectAnswer();
            if ($this->correctAnswer){
                $userTask = UserTask::getUserTaskObject($this->task, $user);
                if ($userTask->is_done == 1){
                    return ['success' => 1, 'correct' => $this->isAnswerCorrect() ? 1 : 0, 'attempt' => $userTask->attempt, 'score' => $userTask->score, 'moduleName' => $module->name, 'stars' => ModuleHelper::getListStar($module)];
                }
                if ($this->isAnswerCorrect()){
                    $userTask->is_done = 1;
                }else{
                    $userTask->reduceScore();
                }
                $userTask->attempt = $userTask->attempt + 1;
                $userTask->save();
                $user->actualizeScore();
                return ['success' => 1, 'correct' => $userTask->is_done, 'attempt' => $userTask->attempt, 'score' => $userTask->score, 'moduleName' => $module->name, 'stars' => ModuleHelper::getListStar($module)];
            }else{
                return ['success' => 0, 'message' => 'Ошибка в задаче'];
            }
        }else{
            return ['success' => 0, 'message' => 'Не найдено задача с таким id'];
        }

    }


}