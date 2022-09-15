<?php
use common\models\User;
use frontend\models\ContactForm;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;
$user = Yii::$app->user->identity;
$categoryList = \common\models\Category::find()->all();
$settings = \frontend\models\FrontendHelper::getSetting();
$currUrl = Yii::$app->request->url;
if ($currUrl[0] == '/'){
    $currUrl = substr($currUrl, 1);
}
$model = new ContactForm;
?>

<div class="loader"></div>
<header>
    <div class="main-container">
        <div class="header">
            <a href="/" rel="nofollow"><img class="logo" src="/img/landing/header-logo.png" alt=""></a>

            <nav id="burgerMenu" class="header-nav">
                <li class="burger-block header-nav__item d-flex d-lg-none">
                    <a href="/" rel="nofollow"><img class="logo d-block d-sm-none" src="/img/landing/header-logo.png" alt=""></a>
                    <div class="burger burgerBtn">
                        <img src="/img/burgerClose.png" alt="">
                    </div>
                </li>
                <li id="catalog-hover" class="header-nav__item">
                    <a class="header-nav__link" href="/catalog/"><p class="header-nav__word">Каталог</p></a>
                    <ul class="submenu submenu-catalog">
                        <?foreach ($categoryList as $category):?>
                            <li class="submenu-item"><a href="/<?=$category->alias;?>/" class="submenu-link" <?=$currUrl == $category->alias ? 'rel="nofollow"':'';?> ><?=$category->title;?></a></li>
                        <?endforeach;?>
                    </ul>
                </li>
                <li class="header-nav__item">
                    <a class="header-nav__link" href="/#main-about" rel="nofollow"><p class="header-nav__word">О нас</p></a>
                </li>
                <li class="header-nav__item">
                    <a class="header-nav__link" href="/#nomad-service" rel="nofollow"><p class="header-nav__word">Nomad</p></a>
                </li>
                <li class="header-nav__item">
                    <a class="header-nav__link" href="/service/" <?=$currUrl == 'service' ? 'rel="nofollow"':'';?>><p class="header-nav__word">Сервис</p></a>
                </li>
                <li class="header-nav__item">
                    <a class="header-nav__link" href="/certificates/" <?=$currUrl == 'certificates' ? 'rel="nofollow"':'';?>><p class="header-nav__word">Сертификаты</p></a>
                </li>
                <li class="header-nav__item">
                    <a class="header-nav__link" href="/contacts/" <?=$currUrl == 'contacts' ? 'rel="nofollow"':'';?>><p class="header-nav__word">Контакты</p></a>
                </li>
                <li class="header-nav__item header-nav__soc d-flex d-lg-none">
                    <div class="header-soc__item">

                        <a href="<?=$settings->instagram;?>" rel="nofollow"> <img src="/img/footer/inst.svg" alt=""></a>
                    </div>
                    <div class="header-soc__item">

                        <a href="<?=$settings->whatsapp;?>" rel="nofollow"><img src="/img/footer/whatsapp.svg" alt=""></a>
                    </div>
                    <div class="header-soc__item">

                        <a href="<?=$settings->facebook;?>" rel="nofollow"><img src="/img/footer/face.svg" alt=""></a>
                    </div>
                </li>
            </nav>

            <div class="header-contact">
                <a id="phone" class="header-contact__block" href="tel:<?=str_replace(' ', '', $settings->getMainPhone());?>" rel="nofollow">
                    <img src="/img/landing/header-contact.svg" alt="">
                </a>
                <lable class="d-none d-xl-block" from="phone"><a href="tel:<?=str_replace(' ', '', $settings->getMainPhone());?>" rel="nofollow"><?=$settings->getMainPhone();?></a></lable>
                <a class="button-main button-header mx-3 d-none d-sm-block" href="#" rel="nofollow" data-toggle="modal" data-target="#contact-me">Оставить заявку</a>
                <div class="burger burgerBtn d-flex d-lg-none">
                    <img src="/img/header-burger.svg" alt="">
                </div>
            </div>
        </div>
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

<div id="fixed-button">
    <div class="top-circles" style="display: none">
        <div class="circle whatsapp">
            <a href="<?=$settings->whatsapp;?>"><img src="/img/whatsapp.svg" alt=""></a>
        </div>
        <div class="circle file">
            <a href="#" rel="nofollow" data-toggle="modal" data-target="#contact-me"><img src="/img/file.svg" alt=""></a>
        </div>
        <div class="circle phone">
            <a href="tel:<?=str_replace(' ', '', $settings->getMainPhone());?>"><img src="/img/landing/header-contact.svg" alt=""></a>
        </div>
    </div>
    <div class="bottom-circle">
        <div class="large-circle request">
            <a href="#" rel="nofollow"><img src="/img/file.svg" alt=""></a>
        </div>
    </div>


</div>