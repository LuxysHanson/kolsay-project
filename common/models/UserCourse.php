<?php

namespace common\models;

use Yii;
use common\components\ActiveRecord;
/**
 * This is the model class for table "user_course".
 *
 * @property int $id
 * @property int $course_id
 * @property int $user_id
 * @property int|null $ts
 * @property int|null $is_deleted
 *
 * @property Course $course
 * @property User $user
 */
class UserCourse extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'user_id'], 'required'],
            [['course_id', 'user_id', 'ts', 'is_deleted'], 'integer'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            ['ts', 'default', 'value' => function(){
                return time();
            }]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'course_id' => Yii::t('app', 'Курс'),
            'user_id' => Yii::t('app', 'Пользователь'),
            'ts' => Yii::t('app', 'Время приобретения курса'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
