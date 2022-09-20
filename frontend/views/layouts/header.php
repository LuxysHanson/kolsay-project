<?php
use common\models\User;
use frontend\models\ContactForm;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;
$user = Yii::$app->user->identity;
$settings = \frontend\models\FrontendHelper::getSetting();
$currUrl = Yii::$app->request->url;
if ($currUrl[0] == '/'){
    $currUrl = substr($currUrl, 1);
}
$model = new ContactForm;
?>

<div class="loader"></div>
<header class="header-dark">
    <div class="container-fluid">
        <nav class="header">
            <a class="navbar-brand header-logo" href="/"><img class="logo-white" src="/img/main/logo.svg" alt=""> <img class="logo-dark" src="/img/main/logo-dark.svg" alt=""></a>
            <ul class="burger-menu">
                <p class="burger-close center">x</p>
                <li class="nav-item active">
                    <a class="nav-link" href="/site/about">О парке</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/site/tourism">Туризм</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/site/about">Наука - защита</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news/press">Пресс - центр</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/site/work">Сотрудничество</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/site/foto">Архив</a>
                </li>
            </ul>
            <div class="align-items-center text-white header-panel-1">
                <p class="text-dark">Рус</p>
                <img class="mx-3" src="/img/main/search-dark.svg" alt="">
                <img class="burger" src="/img/main/menu-dark.svg" alt="">
            </div>
            <div class="align-items-center text-white header-panel-2">
                <p class="text-white">Рус</p>
                <img class="mx-3" src="/img/main/search.svg" alt="">
                <img class="burger" src="/img/main/menu.svg" alt="">
            </div>
        </nav>
    </div>
</header>

<!-- Modal -->
<div class="modal fade" id="contact-me" tabindex="-1" aria-labelledby="contact-meLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <img src="/img/logo-grey.png" alt="Bass Technology серый логотип" width="134" height="40">
                    </div>
                    <div class="col-12">
                        <span style="font-size: 25px; ;font-weight: bold;">Оставить заявку</span>
                    </div>
                </div>
                <?php $form = ActiveForm::begin(['options' => ['class' => 'row mt-2', 'id' => 'form-contact-me'], 'action' => '/site/contact']); ?>

                <?= $form->field($model, 'org_name', ['options' =>['class'=>'col-12 mb-1']])->textInput() ?>

                <?= $form->field($model, 'name', ['options' =>['class'=>'col-12 mb-1 col-md-6']])->textInput() ?>
                <?= $form->field($model, 'last_name', ['options' =>['class'=>'col-12 mb-1 col-md-6']])->textInput() ?>

                <?= $form->field($model, 'email',['options' =>['class'=>'col-12 mb-1']])->textInput() ?>
                <?= $form->field($model, 'phone',['options' =>['class'=>'col-12 mb-1']])->textInput() ?>
                <?= $form->field($model, 'verifyCode', ['options' =>['class'=>'col-12 mb-1 mt-1']])->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-4">{image}</div><div class="col-6 offset-1">{input}</div></div>',
                ])->label(false) ?>
                <div class="form-group col-12 mt-2 pb-4">
                    <?= Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn button-main button-blue']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
