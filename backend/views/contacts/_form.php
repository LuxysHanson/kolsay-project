<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Contacts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
    <?if($model->scenario == \common\models\Contacts::SCENARIO_EMPLOYER):?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?endif;?>
    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(\common\models\Contacts::getTypeList(),['disabled' => true]) ?>
    <?if($model->type == \common\models\Contacts::TYPE_SERVICE_CENTER):?>
        <?= $form->field($model, 'map_x')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'map_y')->textInput(['maxlength' => true]) ?>
    <?endif;?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
