<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Category;
/* @var $this yii\web\View */
/* @var $categoryList common\models\Category[] */
/* @var $itemList common\models\Items[]*/
/* @var $pages \yii\data\Pagination */
/* @var $curr_category string*/
/* @var $currCategory Category*/

use frontend\components\BreadCrumbsHelper;
if ($currCategory){
    $this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['/catalog']];
    $this->params['breadcrumbs'][] = $currCategory->title;
}else{
    $this->params['breadcrumbs'][] = 'Каталог товаров';
}

$js = <<<JS
    const sidebarBurgerBtn = document.querySelector('#sidebarBurger');
    const sidebarBurgerClose = document.querySelector('#sidebarBurgerClose');

    let showSidebar = true

    if(sidebarBurgerBtn){sidebarBurgerBtn.addEventListener('click', sidebarShow)}
    if(sidebarBurgerClose){sidebarBurgerClose.addEventListener('click', sidebarShow)}

function sidebarShow(){
        if(showSidebar){
            sidebarMenu.classList.add('active')
            showSidebar = false
        }else{
            sidebarMenu.classList.remove('active')
            showSidebar = true
        }
    }

JS;

$this->registerJs($js);
BreadCrumbsHelper::addBreadCrumbList();
?>

<main>
    <section class="section-first">
        <div class="main-container">
            <div>
                <div class="title mb-5">
                    <h1 class="catalog-title"><?=$currCategory ? $currCategory->title : 'Каталог товаров'?></h1>
                    <span id="sidebarBurger" class="sidebar-burger d-flex d-lg-none">
                        <img src="/img/sidebar-open.svg" alt="">
                    </span>
                </div>
                <div class="product-page__main">
                    <div class="sidebar">
                        <p class="sidebar-title" style="font-size: 35px;">Категории
                            <span id="sidebarBurgerClose" class="sidebar-burger d-flex d-lg-none">
                                <img src="/img/sidebar-close.svg" alt="">
                            </span>
                        </p>
                        <ul class="sidebar-nav">
                            <li class="sidebar-nav__item <?=is_null($curr_category) ?'active':'';?>"">
                            <?= Html::a(Yii::t('app', 'Все'), ['/catalog'],['class' => 'sidebar-catalog']) ?>
                            </li>
                            <? foreach ($categoryList as $category):?>
                                <li class="sidebar-nav__item <?=$category->alias == $curr_category ?'active':'';?>">
                                    <?= Html::a(Yii::t('app', $category->title), ['/'.$category->alias], ['class' => 'sidebar-catalog', 'rel' => $category->alias == $curr_category?'nofollow':'']) ?>
                                </li>
                            <?endforeach;?>
                        </ul>
                    </div>
                    <div class="product-page__content">
                        <?foreach ($itemList as $item):?>
                            <div class="main-card">
                                <div style="background: url('<?= $item->getMainImage()?>');
                                        width: 80%;
                                        height: 150px;
                                        background-repeat: no-repeat;
                                        background-size: contain;
                                        background-position: center;
                                        "></div>
                                <div class="product-line__card"></div>
                                <p class="main-card__title"><a  href="<?='/' . $item->category->alias .'/'. $item->alias . '/';?>"><?=$item->title?></a></p>
                                <?= Html::a(Yii::t('app', 'Посмотреть'), [$item->category->alias .'/'. $item->alias], ['class' => "button-main button-blue"]) ?>
                            </div>
                        <?endforeach;?>
                            <div class="pagination">
                                <?echo \yii\bootstrap4\LinkPager::widget([
                                    'pagination' => $pages,
                                ]);?>
                            </div>
                    </div>
                </div>
               <!-- <div style="display: flex; padding-top: 50px">
                    <?/*if (!empty($currCategory)):*/?>
                        <?/* $keywords = explode(",", $currCategory->keywords)*/?>
                        <?/*foreach ($keywords as $keyword):*/?>
                            <p style="font-size:10px;padding: 5px; margin: 0 5px;background: rgba(218, 218, 218, 0.2);color: #000!important;border-radius: 4px;"><?/*=$keyword*/?></p>
                        <?/*endforeach;*/?>
                    <?/*endif;*/?>
                </div>-->
            </div>
        </div>
        <?if($currCategory && $currCategory->seo_text):?>
        <hr>
        <div class="main-container">
            <?=$currCategory->seo_text?>
        </div>
        <?endif;?>


    </section>
</main>

