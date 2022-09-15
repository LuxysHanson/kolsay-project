<?php

/* @var $this yii\web\View */
/* @var $categoryList common\models\Category[] */

use yii\helpers\Html;
$this->params['breadcrumbs'][] = 'Карта сайта';
\frontend\components\BreadCrumbsHelper::addBreadCrumbList();
?>
<style>
    li.first-level {
        list-style: square;
        margin-left: 20px;
    }


    li.second-level{
        list-style: circle;
        margin-left: 20px;
    }
    li.third-level{
        list-style: square;
        margin-left: 20px;
    }
</style>
<div class="sitemap main-container pb-5">
    <h1>Карта сайта</h1>
    <div class="row">
        <div class="col-md-6 col-12">
            <ul>
                <li class="first-level"><a href="/">Главная</a></li>
                <li class="first-level"><a href="/#about-company">О нас</a></li>
                <li class="first-level"><a href="/#nomad-service">Nomad System</a></li>
                <li class="first-level"><a href="/service/">Сервис Обслуживание</a></li>
                <li class="first-level"><a href="/certificates/">Сертификаты</a></li>
                <li class="first-level"><a href="/contacts/">Контакты</a></li>
                <li class="first-level">
                    <a href="/catalog/">Каталог</a>
                    <ul>
                        <?for($i = 0; $i < 3; $i++):?>
                            <li class="second-level">
                                <a href="/<?=$categoryList[$i]['alias'];?>/"><?=$categoryList[$i]['title'];?></a>
                                <?if($categoryList[$i]->items):?>
                                    <ul>
                                        <?foreach ($categoryList[$i]->items as $item):?>
                                            <li class="third-level"><a href="/<?=$categoryList[$i]['alias'];?>/<?=$item['alias'];?>/"><?=$item['title'];?></a></li>
                                        <?endforeach;?>
                                    </ul>
                                <?endif;?>
                            </li>
                        <?endfor;?>
                    </ul>
                </li>

            </ul>
        </div>
        <div class="col-md-6 col-12">
            <ul style="padding-left: 20px;">
                <?for($i = 3; $i < sizeof($categoryList); $i++):?>
                    <li class="second-level">
                        <a href="/<?=$categoryList[$i]['alias'];?>/"><?=$categoryList[$i]['title'];?></a>
                        <?if($categoryList[$i]->items):?>
                            <ul>
                                <?foreach ($categoryList[$i]->items as $item):?>
                                    <li class="third-level"><a href="/<?=$categoryList[$i]['alias'];?>/<?=$item['alias'];?>/"><?=$item['title'];?></a></li>
                                <?endforeach;?>
                            </ul>
                        <?endif;?>
                    </li>
                <?endfor;?>
            </ul>
        </div>
    </div>
</div>
