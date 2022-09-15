<?php

namespace frontend\models\forms;

use Yii;
use yii\base\Model;


class MessageForm extends Model
{
    public $file;
    public $text;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],
            [['file'], 'file', 'extensions' => ['png', 'jpg', 'pdf', 'doc', 'xls', 'docx', 'xlsx', 'jpeg'], 'maxSize' => 1024 * 1024 * 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Текст',
            'title' => 'Тема',
            'file' => 'Файл',
        ];
    }

}
