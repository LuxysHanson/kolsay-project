<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$settings = \frontend\models\FrontendHelper::getSetting();

$this->params['breadcrumbs'][] = $this->title;
\frontend\components\BreadCrumbsHelper::addBreadCrumbList();
?>

<div class="main-container" style="padding: 20px 0 150px 0">

    <div style="margin-bottom: 50px" class="col-12">
        <h1>Контакты</h1>
        <span class="service-title">Официальный адрес</span>
        <div class="row" id="map-block">

            <script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script>
            <script charset="utf-8">new DGWidgetLoader({"width":"100%","height":(window.innerWidth > 600)? "520":"400","borderColor":"#fff","pos":{"lat":43.3613661154143,"lon":76.98205947875978,"zoom":17},"opt":{"city":"almaty"},"org":[{"id":"9429940000785952"}]});</script>
            <noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
            <div id="map-information">
                <div class="row" style="display: block">
                    <img src="/img/dark_logo.jpg" class="d-flex" style="width: auto;height: auto;">
                    <div>
                        <p style="font-weight: 700; margin-top: 25px">Адрес</p>
                        <p>Республика Казахстан, <?=$settings->address;?></p>
                    </div>
                    <div>
                        <p style="font-weight: 700; margin-top: 20px">Телефон</p>
                        <div style="display: grid">
                            <?foreach ($settings->getPhoneNumbers() as $phoneNumber):?>
                                <a href="tel:<?=str_replace(' ', '',$phoneNumber);?>" rel="nofollow"><?=$phoneNumber;?></a>
                            <?endforeach;?>
                        </div>
                    </div>
                    <div>
                        <p style="font-weight: 700; margin-top: 20px">Email</p>
                        <a href="mailto:<?=$settings->email;?>" rel="nofollow"><?=$settings->email;?></a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div style="margin-bottom: 50px" class="col-12">
        <span class="service-title">Сервис центры</span>
        <p style="font-weight: 500;
            font-size: 18px;
            line-height: 25px;
            letter-spacing: 0.02em;
            color: #000000;">Выезд специалиста Исполнителя при необходимости для оказания услуг по обслуживанию или настройке специализированного программного обеспечения системы электронной очереди сервисных центров по РК</p>
    </div>
    <?=$this->render('service_map', ['cityLists' => $cityLists]);?>

</div>
