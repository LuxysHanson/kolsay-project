<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use common\models\Items;
use yii\helpers\Html;

$this->title = $name;
?>


<main>
    <section class="error">
        <div class="container-fluid">
            <div class="error-block">
                <img src="/img/404.png" alt="">
                <p class="text-uppercase text-center txt-16 mt-3 mb-5">Страница не найдена. Перейдите на главную</p>
                <a href="/" class="btn-error min-title center">Главная</a>
            </div>


        </div>
    </section>
</main>