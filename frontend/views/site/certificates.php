<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->params['breadcrumbs'][] = 'Сертификаты';
\frontend\components\BreadCrumbsHelper::addBreadCrumbList();
?>
<style>
    .certificate-container img{
        max-width: 100%;
    }
</style>

<div class="certificate-container main-container">
    <div class="col-md-12 mb-3">
        <h1>Сертификаты</h1>
    </div>
    <div class="row mb-3">
        <div class="col-md-4 col-12 mb-2">
            <?= \PELock\ImgOpt\ImgOpt::widget(["lightbox_data" => "image-1", "lightbox_src" => "/img/certificates/altynsapa_bass_technology.jpg", "src" => "/img/certificates/mini/altynsapa_bass_technology.jpg", "alt" => "Сертификат Алтын Сапа Bass Technology" ]) ?>
        </div>
        <div class="col-md-4 col-12 mb-2">
            <?= \PELock\ImgOpt\ImgOpt::widget(["lightbox_data" => "image-1", "lightbox_src" => "/img/certificates/сертификат_соответсвия_bass_technology.jpg", "src" => "/img/certificates/mini/сертификат_соответсвия_bass_technology.jpg", "alt" => "Сертификат соответсвия Bass Technology" ]) ?>
        </div>
        <div class="col-md-4 col-12 mb-2">
            <?= \PELock\ImgOpt\ImgOpt::widget(["lightbox_data" => "image-1", "lightbox_src" => "/img/certificates/сертификат_регистрации_bass_technology.jpg", "src" => "/img/certificates/mini/сертификат_регистрации_bass_technology.jpg", "alt" => "Сертификат регистрации Bass Technology" ]) ?>
        </div>

    </div>
    <div class="row mb-5">
        <div class="col-md-4 col-12 mb-2">
            <?= \PELock\ImgOpt\ImgOpt::widget(["lightbox_data" => "image-1", "lightbox_src" => "/img/certificates/свидетельство_bass_technology.jpg", "src" => "/img/certificates/свидетельство_bass_technology.jpg", "alt" => "Свидетельство о государственной регистрации прав на объект авторского права Bass Technology" ]) ?>
        </div>
        <div class="col-md-4 col-12 mb-2">
            <?= \PELock\ImgOpt\ImgOpt::widget(["lightbox_data" => "image-1", "lightbox_src" => "/img/certificates/евразийский_экономически_союз_bass_technology.jpg", "src" => "/img/certificates/mini/евразийский_экономически_союз_bass_technology.jpg", "alt" => "Сертификат соответсвия от Евразийского экономического союза Bass Technology" ]) ?>
        </div>
        <div class="col-md-4 col-12 mb-2">
            <?= \PELock\ImgOpt\ImgOpt::widget(["lightbox_data" => "image-1", "lightbox_src" => "/img/certificates/сертификат_товара_bass_technology.jpg", "src" => "/img/certificates/mini/сертификат_товара_bass_technology.jpg", "alt" => "Сертификат о происхождении товара Bass Technology" ]) ?>
        </div>
    </div>
</div>