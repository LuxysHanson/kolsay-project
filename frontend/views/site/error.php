<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use common\models\Items;
use yii\helpers\Html;
$items = Items::find()->where(['status' => Items::STATUS_PUBLISH])->andWhere(['not', ['attachments' => null]])->orderBy(['rand()'=> SORT_DESC])->limit(4)->all();

$this->title = $name;
?>
<style>
    .error {
        background: url('/img/stars_error.svg');
        background-color: #01212D;
        width: 100%;
        height: 100vh;
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
    }
    .error .error-page{
        padding: 5% 25% 5% 25%;
    }
    .error .error-page img{
        width: 100%;
        margin: 0 auto;
    }

    .error-page .error-subtitle {
        font-weight: 300;
        margin-bottom: 20px;
        color: #ffffff;
        font-size: 18px;
        line-height: 30px;
        text-align: center;
    }

    .error-page .error-actions {
        width: 350px;
        margin: 0 auto;
    }
    .btn-error{
        color: #fff !important;
        border-radius: 4px;
        justify-content: center;
        align-items: center;
        padding: 14px 32px 13px;
    }
    .btn-error.btn-error-main{
        background: #197D9F;
    }
    .btn-error.btn-error-map{
        border: 1px solid #FFFFFF
    }
    .img-suka img{
        width: 150px;
        height: 150px;
    }
    @media (max-width: 900px) {
        .error {
            background: url('/img/stars_error.svg');
            background-color: #01212D;
            background-repeat: no-repeat;
            background-size: auto;
            background-position: center;
        }
        .error .error-page{
            padding: 20vh 2vh;
        }
        .error .error-page img{
            padding: 0 10%;
            height: 100%;
            width: 100%;
        }
        .error-page .error-title {
            font-size: 1px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .error-page .error-subtitle {
            font-weight: 300;
            margin-bottom: 20px;
            color: #ffffff;
            font-size: 18px;
            line-height: 30px;
            text-align: center;
        }

        .error-page .error-actions {
            width: 350px;
            margin: 0 auto;
        }
        .btn-error{
            color: #fff !important;
            border-radius: 4px;
            font-size: 14px;
            line-height: 18px;
            text-align: center;
            letter-spacing: 0.07em;
        }
        .btn-error.btn-error-main{
            background: #197D9F;
        }
        .btn-error.btn-error-map{
            font-size: 14px;
            line-height: 18px;
            text-align: center;
            letter-spacing: 0.07em;
        }
    }
</style>
<section class="error">
    <div class="error-page ">
            <h1 style="display: none"><?= Html::encode($this->title) ?></h1>
            <img src="/img/cosmo.svg" alt="">
            <p class="error-subtitle">Страница не найдена, переходите на главную страницу или посмотрите карту сайта.</p>
            <div class="error-actions">
            <a href="/" class="btn btn-error btn-error-main" style="margin-right: 10px;">На главную</a>
            <a href="/sitemap/" class="btn btn-error btn-error-map">Карта сайта</a>
            </div>
    </div>
</section>

<section class="section-product">
    <div class="main-container">
        <div class="product">
            <div class="title">
                <div>
                    <p class="title-text">Продукция</p>
                    <span class="service-title">Популярные товары</span>
                </div>
                <a class="button-gray button" href="/catalog/">Все товары</a>
            </div>

            <div class="main-content product-content">
                <?foreach ($items as $item):?>
                    <div class="main-card">
                        <div class="img-suka">
                            <?if($item->getMainImage() && strlen($item->getMainImage()) > 0):?>
                                <?= \PELock\ImgOpt\ImgOpt::widget(["src" => $item->getMainImage(), "alt" => $item->title ]) ?>
                            <?endif;?>
                        </div>
                        <div class="product-line__card"></div>
                        <p class="main-card__title" style="margin-bottom: 20px; height: 60px;"><a  href="<?=$item->category->alias .'/'. $item->alias;?>/"><?=$item->title?></a></p>
                        <p class="main-card__text" style="color: grey; margin-bottom: 10px"><?=$item->category->title?></p>
                        <a class="button-main button-blue" href="<?=$item->category->alias .'/'. $item->alias;?>/">Посмотреть</a>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    </div>
</section>
