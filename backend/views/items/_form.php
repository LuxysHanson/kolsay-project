<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;
use yii\helpers\ArrayHelper;
use common\models\Items;

/* @var $this yii\web\View */
/* @var $model common\models\Items */
/* @var $form yii\widgets\ActiveForm */
$url = Yii::$app->params['url'];
$js = <<<JS
$('.news-form').find("textarea[textareatype='ckeditor']").each(function() {
    CKEDITOR.inline($(this)[0], {
        customConfig: 'config.js'
    });
});
$('#click-to-file').click(function (e){
    e.preventDefault();
    $('#fake-file-input').click();
})

$('#fake-file-input').change(function (e){
    var fd = new FormData();
    var files = $(this)[0].files;
    if(files.length > 0 ){
       fd.append('file',files[0]);

       $.ajax({
          url: '/items/upload-file',
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response){
              response = JSON.parse(response);
              if(response.link){
                  let html = 
                      '<li>'+
                        '<img src="$url'+response.link+'">'+
                        '<div class="form-group field-items-file_info">'+
                            '<input type="hidden" id="items-file" class="form-control" name="Items[file_info][]" value="'+response.link+'">'+
                            '<div class="help-block"></div>'+
                        '</div>'+
                        '<a href="#" class="delete-file"><i class="fa fa-times-circle" aria-hidden="true"></i></a>'+
                      '</li>';
                  $('.file-gallery').append(html);
                  $('.delete-file').click(function (e){
                        e.preventDefault();
                        let li = $(this).parent('li');
                        $(li).remove();
                  });
              }
              
          },
       });
    }
})

$('.delete-file').click(function (e){
    e.preventDefault();
    let li = $(this).parent('li');
    $(li).remove();
})
JS;


$this->registerJs($js);
?>


<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title_meta')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ceo_desc')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'alias')->textInput() ?>
    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::getCategories(), 'id', 'title')) ?>
    <div class="row">
        <div class="col-6"><?= $form->field($model, 'size')->textInput() ?></div>
        <div class="col-6"><?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?></div>
        <div class="col-6"><?= $form->field($model, 'guarantee')->textInput(['maxlength' => true]) ?></div>
        <div class="col-6"><?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?></div>
    </div>
    <input type="file" name="fake-file" class="d-none" id="fake-file-input">
    <a href="#" class="btn btn-primary" id="click-to-file"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Загрузить фото</a>

    <div class="row mt-3">
        <div class="col-12">
            <ul class="file-gallery">
                <?if($model->getFiles() && is_array($model->getFiles()) && sizeof($model->getFiles() ) > 0):?>
                    <?foreach($model->getFiles() as $key => $attachment):?>
                        <li>
                            <img src="<?=Yii::$app->params['url'];?>/<?=$attachment?>">
                            <?= $form->field($model, "file_info[]")->hiddenInput(['value' => $attachment])->label(false) ?>
                            <a href="#" class="delete-file"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </li>
                    <?endforeach;?>
                <?endif;?>
            </ul>
        </div>
    </div>
    <hr>

    <div class="form-group field-items-description">
        <label for="items-description">Содержание:</label>
        <textarea textareatype="ckeditor" cktype="inline" class="form-control" id="items-description" name="Items[description]" rows="6" ><?=$model->description?></textarea>
        <div class="help-block"></div>
    </div>
    <div class="form-group field-items-characters">
        <label for="items-characters">Характеристики:</label>
        <textarea textareatype="ckeditor" cktype="inline" class="form-control" id="items-characters" name="Items[characters]" rows="6" ><?=$model->characters?></textarea>
        <div class="help-block"></div>
    </div>
    <?= $form->field($model, 'status')->dropDownList(Items::getStatusList()) ?>


    <?= $form->field($model, 'pres_file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
