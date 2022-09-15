<?php
namespace frontend\models\forms;

use common\models\User;
use yii\base\Model;
use Yii;

class AvatarForm extends Model
{
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }


    public function upload($userId, $data)
    {
        $user = User::findOne($userId);
        $name = md5($userId + time()) . '.png';
        $image_name = Yii::$app->basePath . '/web/img/avatars/' . $name;
        file_put_contents($image_name, $data);
        if($user->avatar != null){
            unlink(Yii::$app->basePath . '/web/' . $user->avatar );
        }
        $user->avatar = '/img/avatars/' . $name;
        $user->save();
        return true;

    }

}
