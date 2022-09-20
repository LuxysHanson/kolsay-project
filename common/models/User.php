<?php

namespace common\models;

use common\traits\AttributesToInfoTrait;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use common\components\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\JsonResponseFormatter;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property string $phone
 * @property string $avatar
 * @property integer $system_role
 * @property integer $created_at
 * @property integer $country_id
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    const ROLE_DEFAULT_USER = 0;
    const ROlE_TEACHER = 1;
    const ROLE_MODERATOR = 10;
    const ROLE_ADMIN = 20;
    const ROLE_SUPER_ADMIN = 30;

    public $tempPassword;

    use AttributesToInfoTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @return string[]
     */
    public function attributesToInfo()
    {
        return [
            'phone',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function loadDefaultValues($skipIfSet = true)
    {
        $this->system_role = self::ROLE_DEFAULT_USER;
        return parent::loadDefaultValues($skipIfSet); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['middle_name','phone','country_id','city_id','school_id','school_grade_id','score', 'tempPassword', 'system_role'],'safe'],
            ['email', 'email'],
            [['email', 'first_name', 'last_name'], 'required'],
            ['tempPassword', 'string', 'min' => 6],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            ['system_role', 'in', 'range' => [self::ROLE_DEFAULT_USER, self::ROLE_ADMIN, self::ROLE_MODERATOR, self::ROLE_SUPER_ADMIN]],
        ];
    }

    /**
     * @param $runValidation
     * @param $attributeNames
     * @return bool
     */
    public function save($runValidation = true, $attributeNames = null)
    {
        $this->username = $this->email;
        if ($this->isNewRecord && $this->tempPassword && strlen($this->tempPassword) > 6){
            $this->setPassword($this->tempPassword);
            $this->generateAuthKey();
            $this->generateEmailVerificationToken();
        }

        return parent::save($runValidation, $attributeNames); // TODO: Change the autogenerated stub
    }

    public static function isAccess($role){
        if(!Yii::$app->user->isGuest){
            $user = self::findOne(Yii::$app->user->identity->id);
            if ($user->system_role >= $role){
                return true;
            }
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getFio(){
        $result = '';
        if ($this->last_name){
            $result .= $this->last_name;
        }
        if ($this->first_name){
            $result .= ' '. $this->first_name;
        }
        if ($this->middle_name){
            $result .= ' '. $this->middle_name;
        }


        return $result;
    }

    public function getShortFio(){
        $result = '';
        if ($this->last_name){
            $result .= $this->last_name;
        }
        if ($this->first_name){
            $result .= ' '.mb_substr($this->first_name, 0, 1).'.';
        }
        if ($this->middle_name){
            $result .= ' '.mb_substr($this->middle_name, 0, 1).'.';
        }
        if (strlen($result) < 1){
            $result = $this->email;
        }


        return $result;
    }
    public function getShortName(){
        $result = '';
        if ($this->last_name){
            $result .= mb_substr($this->last_name, 0, 1);
        }
        if ($this->first_name){
            $result .= mb_substr($this->first_name, 0, 1);
        }
        return $result;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token)
    {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function isDefaultUser(){
        if ($this->system_role == self::ROLE_DEFAULT_USER){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }



    /**
     * @return array
     */
    public static function roleList(){
        return [
          self::ROLE_DEFAULT_USER => Yii::t('main', 'Пользователь'),
          self::ROLE_MODERATOR => Yii::t('main', 'Модератор'),
          self::ROLE_ADMIN => Yii::t('main', 'Администратор'),
          self::ROLE_SUPER_ADMIN => Yii::t('main', 'Владелец'),
        ];
    }

    /**
     * @param Integer $role
     * @return mixed
     */
    public static function getRoleLabel(integer $role){
        return self::roleList()[$role];
    }

    /**
     * @return mixed
     */
    public function getRoleName(){
        return self::roleList()[$this->system_role];
    }

    public function getFioInitials(){
        if ($this->last_name && $this->first_name){
            return mb_strtoupper(mb_substr($this->last_name, 0, 1).mb_substr($this->first_name,0,1));
        }else{
            return mb_strtoupper(mb_substr($this->email,0,2));
        }

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'username' => 'Логин',
            'last_name' => 'Фамилия',
            'system_role' => 'Роль',
            'created_at' => 'Дата и время',
            'email' => 'E-mail',
            'phone' => 'Номер телефона'
        ];
    }
}
