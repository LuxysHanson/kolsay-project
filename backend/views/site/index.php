<?php

/* @var $this yii\web\View */
/* @var $model common\models\Settings */

use yii\widgets\ActiveForm;
$this->title = 'Настройки сайта';
?>

<?=$this->render('_form', ['model' => $model, 'readonly' => true])?>

<div class="form-group mt-3">
    <a href="/site/update-settings" class="btn btn-danger">Редактировать</a>
</div>


