<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Кіру';
?>
<div class="register">

    <div class="register-content" style="margin-bottom: 100px;">
        <p class="register-title"><?=Yii::t('main', 'Регистрация');?></p>
        <div class="register-img">
            <img class="img-sign" src="/img/landing/welcome.png" alt="">
        </div>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'email')->textInput(['class' => 'register-input', 'autofocus' => true, 'placeholder' => Yii::t('main', 'Почта')])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput(['class' => 'register-input', 'placeholder' => Yii::t('main', 'Пароль')])->label(false) ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('main', 'Войти'), ['class' => 'register-button', 'name' => 'signup-button']) ?>
        </div>
        <div class="register-link">
            <a href="/auth/signup"><?=Yii::t('main', 'Еще не зарегистрировались?');?> <span><?=Yii::t('main', 'Зарегистрироваться');?></span></a>
            <br>
            <a href="/# rel nofollow">На главную</a>
        </div>
        <div>

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

