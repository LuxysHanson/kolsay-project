<?php
/* @var $this yii\web\View */
/* @var $this common\models\User */
/* @var $this common\models\News */
/* @var $news array */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<main>
   <div class="main-container">
       <div class="main-title">
           <p>Новости</p>
       </div>
       <?= $this->params['breadcrumbs'][] = $this->title; ?>
       <div class="news-content">
           <div class="news-card__block">
               <? foreach ($news as $item):?>
               <div class="card news-card">
                   <img class="news-card__img" src="<?= $item->image ?>" alt="" style="max-width: 253px">
                   <div>
                       <p class="news-card__title"><?= $item->title ?></p>
                       <p class="news-card__text" style="font-size: 14px"><?= date("d.m.Y г.", $item->created_at) ?></p>
                       <p class="news-card__text"><?= mb_strimwidth($item->content, 0, 150) ?></p>
                       <a class="news-card__btn" href="<?=Url::to(['/news/view','id'=>$item->id, 'name'=>$item->title])?>">Посмотреть</a>
                   </div>
               </div>
               <? endforeach;?>

           </div>
       </div>
   </div>

</main>

<!--<div class="news-card__text">
    <div class="news-circle">
        <img src="" alt="">
    </div>
    <p>Колтай Бакберген</p>
</div>
<div class="news-card___footer">
    <div class="news-footer__info">
        <img src="img/icon/news-file-icon.svg" alt="">
        <span>24</span>
    </div>
    <div class="news-footer__info">
        <img src="img/icon/news-clock-icon.svg" alt="">
        <span>8</span>
    </div>
</div>-->
