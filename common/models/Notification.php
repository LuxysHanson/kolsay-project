<?php

namespace common\models;

use Yii;
use common\components\ActiveRecord;
use common\traits\AttributesToInfoTrait;
/**
 * This is the model class for table "notification".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $type
 * @property string|null $message
 * @property string|null $org_name
 * @property string|null $email
 * @property string|null $name
 * @property string|null $last_name
 * @property string|null $info
 * @property string|null $phone
 * @property int|null $is_deleted
 * @property int|null $created_at
 */
class Notification extends ActiveRecord
{
    use AttributesToInfoTrait;

    const TYPE_REQUEST_FROM_SITE = 1;

    /**
     * @return array
     */
    public function attributesToInfo()
    {
        return [
            'org_name',
            'email',
            'name',
            'last_name',
            'phone'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type', 'is_deleted'], 'integer'],
            [['message'], 'string'],
            [['created_at'], 'default', 'value' => function($a){
                return time();
            }],

        ];
    }

    /**
     * @return array
     */
    public function getTypeLabelList(): array
    {
        return [
            self::TYPE_REQUEST_FROM_SITE => Yii::t('app', 'Заявка с сайта'),
        ];
    }

    public function getTypeLabel(){
        return self::getTypeLabelList()[$this->type];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'type' => 'Название',
            'message' => 'Сообщение',
            'info' => 'Info',
            'is_deleted' => 'Is Deleted',
            'org_name' => 'Наименование организации',
            'created_at' => 'Дата и время',
            'name' => 'Имя',
            'last_name' => 'Фамилия',
            'rang' => 'Должность',
            'email' => 'E-mail',
            'phone' => 'Номер телефона'
        ];
    }


}
