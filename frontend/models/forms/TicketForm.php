<?php

namespace frontend\models\forms;

use Yii;
use yii\base\Model;

class TicketForm extends Model
{
    public $file;
    public $text;
    public $title;
    public $category;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text','title','category'], 'required'],
            [['text'], 'string'],
            [['file'], 'file', 'extensions' => ['png', 'jpg', 'pdf', 'doc', 'xls', 'docx', 'xlsx', 'jpeg'], 'maxSize' => 1024 * 1024 * 3],
            //['tokens', 'checkTokens'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Текст',
            'title' => 'Тема',
            'file' => 'Файл',
            'category' => 'Раздел',
        ];
    }

}
