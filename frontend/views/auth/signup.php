<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
$js = <<<JS
    $("#phone").mask("+7(999)9999999");
JS;
$this->registerJs($js);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->title = 'Тіркелу';
?>
<script src="" type="text/javascript"></script>

<div class="register">
    <div class="register-content">
        <p class="register-title"><?=Yii::t('main', 'Регистрация');?></p>
        <?php $form = ActiveForm::begin(['id' => 'form-signup', 'class' => 'container']); ?>
        <div class="input-block">
            <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class'=>'register-input', 'placeholder'=> $model->getAttributeLabel('email'), 'autocomplete' => 'off'])->label(false) ?>
            <?= $form->field($model, 'password')->passwordInput([ 'class'=>'register-input', 'placeholder'=> $model->getAttributeLabel('password'), 'autocomplete' => 'new-password'])->label(false) ?>
            <?= $form->field($model, 'first_name')->textInput(['class'=>'register-input', 'placeholder'=> $model->getAttributeLabel('first_name'), 'autocomplete' => 'off'])->label(false) ?>
            <?= $form->field($model, 'last_name')->textInput(['class'=>'register-input', 'placeholder'=> $model->getAttributeLabel('last_name'), 'autocomplete' => 'off'])->label(false) ?>
            <?= $form->field($model, 'middle_name')->textInput(['class'=>'register-input', 'placeholder'=> $model->getAttributeLabel('middle_name'), 'autocomplete' => 'off'])->label(false) ?>
            <?= $form->field($model, 'phone')->textInput(['class'=>'register-input', 'id' => 'phone', 'placeholder'=> $model->getAttributeLabel('phone'),'autocomplete' => 'off'])->label(false) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('main', 'Зарегистрироваться'), ['class' => 'register-button', 'name' => 'signup-button']) ?>
        </div>
        <div class="register-link">
            <a href="/auth/login"><?=Yii::t('main', 'Уже зарегистрировались?');?> <span><?=Yii::t('main', 'Войти');?></span></a>
            <br>
            <a href="/# rel nofollow">На главную</a>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>