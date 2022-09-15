<?php

/* @var $this yii\web\View */
/* @var $model common\models\Settings */

use yii\widgets\ActiveForm;

$this->title = 'Редактирование сайта';
$this->params['breadcrumbs'][] = $this->title;
?>

<?=$this->render('_form', ['model' => $model, 'readonly' => false])?>

