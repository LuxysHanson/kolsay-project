<?php
$settings = \frontend\models\FrontendHelper::getSetting();
$categoryList = \common\models\Category::find()->all();
?>

<footer class="bg-blue">
    <div class="main-container">
        <div class="footer">
            <div>
                <a href="/"><img src="/img/landing/header-logo.png" alt=""></a>
                <ul class="footer-nav__soc">
                    <li class="footer-soc__item">
                        <img src="/img/footer/inst.svg" alt="">
                        <a href="<?=$settings->instagram;?>" rel="nofollow"></a>
                    </li>
                    <li class="footer-soc__item">
                        <img src="/img/footer/whatsapp.svg" alt="">
                        <a href="<?=$settings->whatsapp;?>" rel="nofollow"></a>
                    </li>
                    <li class="footer-soc__item">
                        <img src="/img/footer/face.svg" alt="">
                        <a href="<?=$settings->facebook;?>" rel="nofollow"></a>
                    </li>
                </ul>
            </div>

            <ul class="footer-nav">
                <li class="footer-nav__item">
                    <p class="footer-title">О нас</p>
                </li>
                <li class="footer-nav__item">
                    <a href="/#nomad-service"><p>Система Nomad</p></a>
                </li>
                <li class="footer-nav__item">
                    <a href="/catalog/"><p>Каталог товаров</p></a>
                </li>
                <li class="footer-nav__item">
                    <a href="/service/"><p>Сервис обслуживание</p></a>
                </li>
                <li class="footer-nav__item footer-link">
                    <a href="/sitemap/" ><p>Карта сайта </p></a>
                </li>
            </ul>
            <ul class="footer-nav">
                <li class="footer-nav__item">
                    <p class="footer-title">Продукция</p>
                </li>
                <?for ($i = 0; $i < 5; $i++):?>
                    <li class="footer-nav__item">
                        <a href="/<?=$categoryList[$i]['alias'];?>/"><p><?=$categoryList[$i]['title'];?></p></a>
                    </li>
                <?endfor;?>
            </ul>
            <ul class="footer-nav">
                <?for ($i = 5; $i < sizeof($categoryList); $i++):?>
                    <li class="footer-nav__item <?=$i == 5 ? 'footer-item-m':'';?>">
                        <a href="/<?=$categoryList[$i]['alias'];?>/"><p><?=$categoryList[$i]['title'];?></p></a>
                    </li>
                <?endfor;?>
            </ul>

            <ul class="footer-nav">
                <li class="footer-nav__item">
                    <p class="footer-title">Контакты</p>
                </li>
                <?foreach ($settings->getPhoneNumbers() as $phoneNumber):?>
                    <li class="footer-nav__item">
                        <a href="tel:<?=str_replace(' ', '',$phoneNumber);?>" rel="nofollow"> <img src="/img/footer/phone.svg" alt=""> <p><?=$phoneNumber;?></p></a>
                    </li>
                <?endforeach;?>
                <li class="footer-nav__item">
                    <a href="mailto:<?=$settings->email;?>" rel="nofollow"> <img src="/img/footer/message.svg" alt="" > <p><?=$settings->email;?></p></a>
                </li>
                <li class="footer-nav__item">
                    <a href="<?=$settings->two_gis;?>" rel="nofollow"> <img src="/img/footer/position.svg" alt="" > <p><?=$settings->address;?></p></a>
                </li>
                <li class="footer-nav__item">
                    <p><?=$settings->schedule;?></p>
                </li>
                <li class="footer-nav__item">
                    <a href="<?=$settings->two_gis;?>" rel="nofollow"> <img src="/img/footer/position.svg" alt="" > <p>Наш Адрес в 2gis</p></a>
                </li>
            </ul>
        </div>
    </div>
</footer>
