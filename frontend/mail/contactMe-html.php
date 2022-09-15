<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ContactForm */

?>
<div class="password-reset">
    <h3>Новая заявка</h3>
    <p><b>Наименование организации:</b><?=$model->org_name;?> </p>
    <p><b>ФИО:</b><?=$model->last_name;?>  <?=$model->name;?></p>
    <p><b>E-mail:</b><?=$model->email;?></p>
    <p><b>Номер телефона:</b><?=$model->phone;?></p>
</div>
