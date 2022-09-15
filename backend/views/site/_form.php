<?php

/* @var $this yii\web\View */
/* @var $model common\models\Settings */
/* @var $readonly boolean */
use yii\widgets\ActiveForm;

$js = <<<JS
$('#add-phone').click(function (e){
   e.preventDefault();
   $(this).before('<input type="text" class="form-control mb-1" name="Settings[phoneList][]" value="" maxlength="255">');
});
JS;
$this->registerJs($js);
?>
<section>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
    <div class="row">
        <?= $form->field($model, 'url', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'email', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
    </div>

    <?if($model->logo):?>
        <div class="form-group field-settings-phoneList">
            <label class="control-label" for="phone-url">Логотип</label>
            <br>
            <img src="<?=$model->url;?><?=$model->logo;?>" alt="" style = "max-width:100px">
        </div>
    <?endif;?>
    <?if(!$readonly):?>
        <?= $form->field($model, 'image')->fileInput()->label(false); ?>
    <?endif;?>

    <div class="row mt-2">
        <?= $form->field($model, 'address', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'schedule', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
    </div>


    <div class="form-group field-settings-phoneList mt-2">
        <label class="control-label" for="phone-url">Номера телефонов</label>
        <?foreach ($model->phoneList as $phone):?>
            <input type="text" class="form-control mb-1" name="Settings[phoneList][]" value="<?=$phone;?>" maxlength="255" <?=$readonly ?'disabled':'';?>>

        <?endforeach;?>
        <?if (!$readonly):?>
            <a class="btn btn-info mt-3" href="#" id="add-phone"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Добавить номер</a>
        <?endif;?>
        <div class="help-block"></div>
    </div>
    <hr>
    <div class="row mt-3">
        <?= $form->field($model, 'instagram', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'facebook', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'whatsapp', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'two_gis', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
    </div>

    <div class="row mt-2">
        <span class="col-12 title-text">Координаты в 2гис</span>
        <?= $form->field($model, 'map_x', ['options' => ['class' => 'col-6']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'map_y', ['options' => ['class' => 'col-6']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
    </div>



    <?if(!$readonly):?>
        <div class="form-group mt-3">
            <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?endif;?>
    <?php ActiveForm::end(); ?>
</section>
