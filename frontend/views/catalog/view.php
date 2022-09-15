<?php

/* @var $this yii\web\View */
/* @var $model \common\models\Items*/
/* @var $popularItems \common\models\Items[]*/

use frontend\components\BreadCrumbsHelper;
use yii\helpers\Html;
use common\models\Category;
$image = $model->getMainImage();
$this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['/catalog']];
$this->params['breadcrumbs'][] = ['label' => $model->category->title, 'url' => ['/'.$model->category->alias]];
$this->params['breadcrumbs'][] = $model->title;
BreadCrumbsHelper::addBreadCrumbList();

$js = <<<JS
    $(".thumbnail").on("click", function (e) {
        e.preventDefault();
        var clicked = $(this);
        var newSelection = clicked.data("big");
        var img = $(".primary").css("background-image", "url(" + newSelection + ")");
        clicked.parent().find(".thumbnail").removeClass("selected");
        clicked.addClass("selected");
        $(".primary").empty().append(img.hide().fadeIn("slow"));
    });
JS;
$this->registerJs($js);

?>

<style>
    .wrapper {
        margin: 0 auto;
        width: 80%;
        text-align: center;
    }

    .image-gallery {
        margin: 0 auto;
        display: table;
    }

    .primary,
    .thumbnails {
        display: table-cell;
    }

    .thumbnails {
        /*width: 300px;*/
        padding: 1px;
    }

    .primary {
        width: 550px;
        height: 400px;
        background-size: contain;
        background-position: center center;
        background-repeat: no-repeat;
    }

    .thumbnail:hover .thumbnail-image, .selected .thumbnail-image {
        border: 4px solid #FFF;
    }

    .thumbnail-image {
        width: 80px;
        height: 80px;
        margin: 10px auto;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        border: 4px solid transparent;
    }
    .nav-link.active{
        border-bottom: 2px solid #197D9F !important;
    }
</style>


<main>
    <section class="section-first">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12" style="
                        border: 1px solid #AEAEAE;
                        border-radius: 15px;">
                    <div class="image-gallery">
                        <main class="primary" style="background-image: url(<?=$model->getMainImage()?>);"></main> <!--главная картинка-->

                        <aside class="thumbnails"><!--мини картинки-->
                            <?foreach ($model->getFiles() as $img):?>
                                <a href="#" class="selected thumbnail" data-big="<?= $img?>">
                                    <div class="thumbnail-image" style="background-image: url(<?= $img?>); background-size: cover;"></div>
                                </a>
                            <?endforeach;?>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12" style="padding: 10px">
                    <h1><?=$model->title?></h1>
                    <div class="p-nav__item">
                        <p class="p-nav__title">Общие описание</p>
                    </div>
                    <div class="p-nav__item">
                        <p class="p-nav__title">Тип</p>
                        <p class="p-nav__text"><?= $model->category->title?></p>
                    </div>
                    <?if($model->size):?>
                        <div class="p-nav__item">
                            <p class="p-nav__title">Размеры, мм</p>
                            <p class="p-nav__text"><?=$model->size?></p>
                        </div>
                    <?endif;?>
                    <?if($model->country):?>
                        <div class="p-nav__item">
                            <p class="p-nav__title">Страна изготовитель</p>
                            <p class="p-nav__text"><?=$model->country?></p>
                        </div>
                    <?endif;?>
                    <?if($model->guarantee):?>
                        <div class="p-nav__item">
                            <p class="p-nav__title">Гарантийный срок</p>
                            <p class="p-nav__text"><?=$model->guarantee?></p>
                        </div>
                    <?endif;?>
                    <?if($model->weight):?>
                        <div class="p-nav__item">
                            <p class="p-nav__title">Вес товара, г</p>
                            <p class="p-nav__text"><?=$model->weight?></p>
                        </div>
                    <?endif;?>

                    <?if($model->presentation):?>
                        <div class="p-nav__item" style="margin: 15px 0; justify-content: normal">
                            <a class="button-main button-blue" href="<?=$model->presentation?>" download="" style="text-align: center; padding: 15px 45px; margin-top: 40px;margin-right: 10px;">Презентация</a>
                            <a class="button-main button-blue" href="#" rel="nofollow" data-toggle="modal" data-target="#contact-me" style="text-align: center; padding: 15px 45px; margin-top: 40px">Узнать цену</a>
                        </div>
                    <?endif;?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-tab section-first">
        <div class="main-container">
            <div style="margin: 100px 0">
                <nav class="tabs-view__nav" style="border-bottom: 2px solid #AEAEAE;">
                    <div class="nav nav-tabs main-container" id="nav-tab" role="tablist"">
                        <a class="tabs-view__btn active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="background: transparent; border: none;">Описание</a>
                        <a class="tabs-view__btn" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" style="background: transparent; border: none;">Характеристики</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="center-block" style="padding-top: 100px">
                            <span class="service-title"><?=$model->title?></span>
                            <p style="line-height: 34px; font-size: 16px;margin: 15px 0">
                                <?=strip_tags($model->description)?>
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="center-block" style="height:100%;padding: 100px 0px">
                            <span class="service-title"><?=$model->title?></span>
                            <?=$model->characters?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-product">
        <div class="main-container">
            <div class="product">
                <div class="title">
                    <div>
                        <span class="service-title">Рекомендуемые товары</span>
                    </div>
                    <a class="button" href="/catalog/">Все товары</a>
                </div>

                <div class="main-content product-content">
                    <?foreach ($popularItems as $item):?>
                        <div class="main-card">
                            <?if($item->getMainImage() && strlen($item->getMainImage()) > 0):?>
                                <?= \PELock\ImgOpt\ImgOpt::widget(["src" => $item->getMainImage(), "alt" => $item->title ]) ?>
                            <?endif;?>
                            <div class="product-line__card"></div>
                            <p class="main-card__title" style="margin-bottom: 20px; height: 60px;"><a  href="/<?=$item->category->alias .'/'. $item->alias . '/';?>"><?=$item->title?></a></p>
                            <p class="main-card__text" style="color: grey; margin-bottom: 10px"><?=$item->category->title?></p>
                            <a class="button-main button-blue" href="/<?=$item->category->alias .'/'. $item->alias . '/';?>" style="text-align: center;">Посмотреть</a>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </section>

</main>
