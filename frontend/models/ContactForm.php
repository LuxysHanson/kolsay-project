<?php

namespace frontend\models;

use common\models\Notification;
use Yii;
use yii\base\Model;
use yii\helpers\Html;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $org_name;
    public $name;
    public $last_name;
    public $rang;
    public $email;
    public $phone;
    public $verifyCode;
    public $subject;
    public $body;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['org_name', 'email', 'name', 'last_name','phone'], 'required'],
            [['rang'], 'safe'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
            'org_name' => 'Наименование организации',
            'name' => 'Имя',
            'last_name' => 'Фамилия',
            'rang' => 'Должность',
            'email' => 'E-mail',
            'phone' => 'Номер телефона',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        $notification = new Notification();
        $notification->message = "<div>
            <h3>Новая заявка</h3>
            <p><b>Наименование организации: </b>$this->org_name </p>
            <p><b>ФИО: </b>$this->last_name $this->name</p>
            <p><b>E-mail: </b>$this->email</p>
            <p><b>Номер телефона: $this->phone</p>
        </div>";
        $notification->type = Notification::TYPE_REQUEST_FROM_SITE;
        $notification->user_id = 1;
        $notification->org_name = $this->org_name;
        $notification->name = $this->name;
        $notification->last_name = $this->last_name;
        $notification->email = $this->email;
        $notification->phone = $this->phone;

        $notification->save();
        $this->subject = 'Заявка от сайта bass-technology.kz';



        try {
            Yii::$app->mailer->compose(['html' => '@frontend/mail/contactMe-html'], ['model' => $this])
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->params['senderName']])
                ->setTo(Yii::$app->params['supportEmail'])
                ->setSubject($this->subject)
                ->send();

        }catch (\Exception $exception){
            return false;
        }



        return true;

    }
    public function sendTelegramNotification()
    {
        //https://api.telegram.org/bot5367834485:AAFAW5xhOqDe0euL0MUOH36Os8NfW4X3ZOs/getUpdates - узнать id чата
        $token = "5367834485:AAFAW5xhOqDe0euL0MUOH36Os8NfW4X3ZOs";
        $chat_id = "-744082923";
        $txt = urlencode(" Новая заявка \n Наименование организации: ".$this->org_name."\n"." ФИО: ".$this->last_name." ".$this->name." \n E-mail: ".$this->email." \n "."Номер телефона: ".$this->phone);
        $url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}";
        try {
            $sendTelegram = fopen($url, "r");
            if (!$sendTelegram){
                throw new \Exception('Error');
            }
        }catch (\Exception $exception){
            return false;
        }



    }
}
