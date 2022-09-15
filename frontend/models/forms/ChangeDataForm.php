<?php
namespace frontend\models\forms;

use common\models\User;
use yii\base\Model;
use Yii;

class ChangeDataForm extends Model
{
    public $first_name;
    public $last_name;
    public $middle_name;
    public $phone;
    public $city;
    public $country;
    public $school;
    public $region;
    public $grade;
    public $imageFile;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'middle_name','phone'], 'filter', 'filter' => 'trim'],
            [['city','country','school','grade','region'], 'integer'],
            [['first_name','last_name'],'required'],
            [['middle_name','phone','country_id','city','school','grade','region'],'safe'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function loadData(){
        $user = User::findOne(Yii::$app->user->identity->getId());
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->middle_name = $user->middle_name;
        $this->city = $user->city_id;
        $this->country = $user->country_id;
        $this->school = $user->school_id;
        $this->region = $user->region_id;
        $this->grade = $user->school_grade_id;
    }

    public function attributeLabels()
    {
        return [
            'first_name' => Yii::t('users', 'Аты'),
            'last_name' => Yii::t('users', 'Тегі'),
            'middle_name' => Yii::t('users', 'Әкесінің аты'),
            'grade' => Yii::t('users', 'Сынып'),
            'school' => Yii::t('users', 'Оқу орны'),
            'city' => Yii::t('users', 'Қала'),
            'country' => Yii::t('users', 'Мемлекет'),
            'phone' => Yii::t('users', 'Телефон'),
        ];
    }

}
