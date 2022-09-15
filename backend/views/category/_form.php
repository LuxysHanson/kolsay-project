<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */

$js = <<<JS
$('.category-form').find("textarea[textareatype='ckeditor']").each(function() {
    CKEDITOR.inline($(this)[0], {
        customConfig: 'config.js'
    });
});
JS;


$this->registerJs($js);
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title_meta')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true])->label('Обязательно записывать через запятую ключевые слова') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group field-category-seo_text">
        <label for="category-seo_text">СЕО текст:</label>
        <textarea textareatype="ckeditor" cktype="inline" class="form-control" id="category-seo_text" name="Category[seo_text]" rows="6" ><?=$model->seo_text?></textarea>
        <div class="help-block"></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
