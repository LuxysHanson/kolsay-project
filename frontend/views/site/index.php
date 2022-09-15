<?php
/* @var $this yii\web\View*/
/* @var $partners common\models\Partners*/
/* @var $products common\models\Products*/
/* @var $items common\models\Items[]*/
try {
    $this->registerJsFile('/js/app_2.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
} catch (\yii\base\InvalidConfigException $e) {
}
$settings = \frontend\models\FrontendHelper::getSetting();
?>

<div class="modal fade" id="myModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-video">
        <img class="modal-close-v" src="img/modalClose.svg" alt="">
        <div class="modal-content">
            <iframe id="modalVideo" width="100%" height="100%" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>


<canvas class="canvas"></canvas>

<section id="bg-welcome" class="section-welcome">
    <div class="main-container">
        <div class="welcome">


            <div class="welcome-slick">
                <div class="welcome-slick__item ">
                    <span class="welcome-slick__title">BASS Technology</span>
                    <p class="welcome-slick__text">Компания "BASS Technology", входящая в группу компаний "IBS GROUP" была основана в 1994 году. На сегодняшний день компания предлагает полный комплекс услуг в области поставок банковского оборудования. Компания является эксклюзивным поставщиком уникального оборудования мировых лидеров. </p>
                </div>
                <div class="welcome-slick__item d-none d-md-block">
                    <h1 class="welcome-slick__title">Система электронной очереди</h1>
                    <p class="welcome-slick__text">Специалистами BASS TECHNOLOGY была разработана и успешно внедрена  система управления электронной очередью NOMAD.  Мы являемся лидерами в сфере автоматизации и управления электронной очередью на территории Республики Казахстан.</p>
                </div>
                <div class="welcome-slick__item d-none d-md-block">
                    <span class="welcome-slick__title">Nomad system</span>
                    <p class="welcome-slick__text">Специалистами BASS TECHNOLOGY была разработана и успешно внедрена</p>
                </div>
            </div>
            <ul class="welcome-soc d-none d-lg-block">
                <li class="welcome-soc__item"><a href="<?=$settings->facebook;?>" rel="nofollow"><img src="/img/footer/face.svg" alt=""></a></li>
                <li class="welcome-soc__item"><a href="<?=$settings->whatsapp;?>" rel="nofollow"><img src="/img/footer/whatsapp.svg" alt=""></a></li>
                <li class="welcome-soc__item"><a href="<?=$settings->instagram;?>" rel="nofollow"><img src="/img/footer/inst.svg" alt=""></a></li>
            </ul>
            <div id="videoPlay" data-toggle="modal" data-target="#myModal">
                <img id="videoImg" src="/img/play-modal.svg" alt="">
            </div>
        </div>
    </div>

</section>

<section class="section-part">
    <div class="main-container">
        <p class="part-title text-center pt-5">Нам доверяют крупные игроки нашего рынка</p>
        <div class="part part-slick">
            <?foreach ($partners as $partner):?>
                <a href="<?=$partner->alias?>" class="part-card" rel="nofollow">
                    <?= \PELock\ImgOpt\ImgOpt::widget(["src" => $partner->image, "alt" => $partner->title]) ?>
                </a>
            <?endforeach;?>
        </div>
    </div>
</section>

<section id="main-about">
    <div class="main-container">
        <div class="about">
            <div class="about-content">
                <div class="title">
                    <div>
                        <p class="title-text">О компании</p>
                        <p class="service-title">BASS Technology</p>
                    </div>
                </div>
                <p class="about-text">ТОО «BASS TECHNOLOGY» Основана В 1994 Году Как Представитель De La Rue Cash Systems. С 1997 Года Занимаем Лидирующую Позицию В Стране В Сфере Автоматизации И Механизации Обработки Денежной Наличности С 2005 Года Мы Поставляем Системы Управления Электронными Очередями Ведущих Европейских Производителей С 2009 Года Компания Начинает Заниматься Созданием И Развитием Собственной Системы Управления Электронными Очередями «Nomad» Мы имеем высококвалифицированных менеджеров прошедших обучение за рубежом, имеющих знания по современным банковским технологиям и оснащению банков самыми современными видами банковского оборудования. Надежная техника плюс высокий уровень гарантийного и сервисного обслуживания, основанный на безупречной квалификации специалистов технического центра, а также индивидуальный подход к запросам каждого клиента позволили закрепить за фирмой репутацию солидного и профессионального партнера. Клиентами фирмы являются около 60 банков, <span class="d-sm-inline d-none" id="read-more-text">крупные финансовые и торговые организации, которым были поставлены различные виды банковского оборудования (машины для пересчета, проверки, сортировки и упаковки денежной наличности, бронированные двери для хранилищ, депозитные системы, сейфы, табло котировок валют и многое другое). Надеемся, что и Вас привлечет возможность стать нашим постоянным клиентом. Отдельно отметим собственную разработку - это система управления электронной очередью "Nomad". Номад в переводе с английского означает - КОЧЕВНИК, что в очередной раз подтверждает казахстанское производство программного обеспечения и некоторых элементов системы. "Nomad" из года в год занимает лидирующую позицию в сравнении с любыми аналогами систем и пользуется популярностью в банковской сфере и государственном секторе.</span><span class="d-block d-sm-none"><a
                                href="#" class="font-weight-bold" rel="nofollow" id="read-more">Читать далее</a></span></p>

                <p class="about-button"><a href="#" class="button-main button-blue modalShow" data-toggle="modal" data-target="#contact-me">Оставить заявку</a></p>
            </div>
            <div class="d-none d-lg-block"><?= \PELock\ImgOpt\ImgOpt::widget(["src" => "/img/landing/about-img.png", "alt" => "About Bass technology" ]) ?></div>
        </div>
    </div>
</section>

    <div class="main-container">
        <div class="title">
            <p class="title-subText">Мы являемся лидерами в сфере автоматизации и управления электронной очередью на территории РК.</p>
        </div>
        <div class="info-content main-content">
            <div class="info-card">
                <p id="infoNum1" class="info-card__title">0</p>
                <p class="info-card__text">Сервисных Центров</p>
            </div>
            <div class="info-card">
                <p id="infoNum2" class="info-card__title">0</p>
                <p class="info-card__text">Лет Опыта Работы</p>
            </div>
            <div class="info-card">
                <p id="infoNum3" class="info-card__title">0</p>
                <p class="info-card__text">Запущенных объектов</p>
            </div>
            <div class="info-card">
                <p id="infoNum4" class="info-card__title">0</p>
                <p class="info-card__text">Довольных Заказчиков</p>
            </div>
        </div>
    </div>

<section>
    <div class="main-container">
        <div class="system">
                <div class="title">
                    <div>
                        <p class="title-text">О нас</p>
                        <p class="service-title">Наши услуги</p>
                        <p class="title-subText">Вы можете ознакомиться с нашими проектами нажав на нашу работу по внедрению системы электронной очереди</p>
                    </div>
                </div>

                <div class="main-content system-content">
                    <div class="main-card">
                        <div class="main-card__img" style="
                        background: url('/img/landing/system-img-1.webp') no-repeat center center;
                        background-position: center;
                        background-size: 170px;"></div>
                        <div class="product-line__card"></div>
                        <p class="main-card__title"><a href="/#nomad-service">Nomad System</a></p>
                    <a href="/#nomad-service" class="button-main button-blue">Перейти</a>
                    </div>

                    <div class="main-card">
                        <div class="main-card__img" style="
                        background: url('/img/landing/system-img-2.webp') no-repeat center center;
                        background-position: center;
                        background-size: 150px;"></div>
                        <div class="product-line__card"></div>
                        <p class="main-card__title"><a href="/service/">Сервисное обслуживание</a></p>
                        <a href="/service/" class="button-main button-blue">Перейти</a>
                    </div>
                    <div class="main-card">
                        <div class="main-card__img" style="
                        background: url('/img/landing/system-img-3.webp') no-repeat center center;
                        background-position: center;
                        background-size: 150px;"></div>
                        <div class="product-line__card"></div>
                        <p class="main-card__title"><a href="/catalog/">Оборудования</a></p>
                        <a href="/catalog/" class="button-main button-blue">Перейти</a>
                    </div>
                </div>
        </div>
    </div>
</section>

<section class="bg-blue section-nomad" id="nomad-service">
    <div class="main-container">
        <div class="nomad">
            <div class="nomad-content">
                <div class="title">
                    <div>
                        <p class="title-text">NOMAD system</p>
                        <p class="service-title">О системе Nomad</p>
                    </div>
                </div>

                <div  class="nomad-block">
                    <p class="nomad-text">Специалистами BASS TECHNOLOGY была разработана и  успешно внедрена  система управления электронной очередью NOMAD.
                        Мы являемся лидерами в сфере автоматизации и управления электронной очередью на территории Республики Казахстан.
                        А так же имеем партнерство с крупными компаниями в Кыргызстане, Узбекистане и Таджикистане. NOMAD SYSTEM станет вашим главным помощником.</p>
                </div>
                <a class="button-main button-blue" href="#" data-toggle="modal" data-target="#contact-me" >Оставить заявку</a>
            </div>
            <div class="nomad-img">
                <?= \PELock\ImgOpt\ImgOpt::widget(["src" => "/img/landing/nomad_system.png", "alt" => "Nomad System от Bass technology"]) ?>
            </div>
        </div>
    </div>
</section>

<section class="bg-blue">
    <div class="main-container">
        <div class="advantage">
            <div class="advantage-content">
                <div class="title">
                    <div>
                        <p class="title-text">NOMAD system</p>
                        <p class="service-title">ПРЕИМУЩЕСТВО  Nomad</p>
                        <p class="title-subText">Наша команда высоко квалицированных технических специалистов разработала собственную систему управления электронной очередью и готова предложить следующие преимущества нашего программного продукта:</p>
                    </div>
                </div>
                <div class="advantage-content__block main-content">
                    <ul class="advantage-nav">
                        <li class="advantage-nav__item">
                            <img src="/img/landing/sercli-gal.svg" alt="">
                            <p>РОСТ ПРИБЫЛИ</p>
                        </li>
                        <li class="advantage-nav__item">
                            <img src="/img/landing/sercli-gal.svg" alt="">
                            <p>ОЦЕНКА КАЧЕСТВА</p>
                        </li>
                        <li class="advantage-nav__item">
                            <img src="/img/landing/sercli-gal.svg" alt="">
                            <p>ОПТИМИЗАЦИЯ РАБОЧЕГО ПРОЦЕССА</p>
                        </li>
                        <li class="advantage-nav__item">
                            <img src="/img/landing/sercli-gal.svg" alt="">
                            <p>ПОНЯТНЫЙ И ИНТУИТИВНЫЙ ИНТЕРФЕЙС</p>
                        </li>
                    </ul>
                    <ul class="advantage-nav">
                        <li class="advantage-nav__item">
                            <img src="/img/landing/sercli-gal.svg" alt="">
                            <p>СКОРОСТЬ ОБСЛУЖИВАНИЕ</p>
                        </li>
                        <li class="advantage-nav__item">
                            <img src="/img/landing/sercli-gal.svg" alt="">
                            <p>ПОВЫШЕНИЕ ЭФФЕКТИВНОСТИ</p>
                        </li>
                        <li class="advantage-nav__item">
                            <img src="/img/landing/sercli-gal.svg" alt="">
                            <p>ОТКАЗАУСТОЙЧИВОСТЬ РАБОТЫ СИСТЕМЫ</p>
                        </li>
                        <li class="advantage-nav__item">
                            <img src="/img/landing/sercli-gal.svg" alt="">
                            <p>ПОРЯДОК И УПРАВЛЕНИЕ ОЧЕРЕДЬЮ</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="nomad-slick">
                    <div class="nomad-slick__item show">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["src" => '/img/landing/nomad-box-version-1.png', "alt" => 'Nomad System система управления электронной очередью 1']) ?>
                    </div>
                    <div class="nomad-slick__item" style="display: none">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["src" => '/img/landing/nomad-box-version-2.png', "alt" => 'Nomad System система управления электронной очередью 2']) ?>
                    </div>
                    <div class="nomad-slick__item " style="display: none">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["src" => '/img/landing/nomad-box-version-3.png', "alt" => 'Nomad System система управления электронной очередью 3']) ?>
                    </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-blue section-opportunities">
    <div class="main-container">
        <div class="opportunities">
            <div class="title">
                <div>
                    <p class="title-text">NOMAD system</p>
                    <p class="service-title">Возможности NOMAD SYSTEM</p>
                    <p class="title-subText">Краткий обзор возможностей системы электронной очереди.</p>
                </div>
            </div>
            <div class="main-content opportunities-content">
                <ul class="opportunities-nav">
                    <li class="opportunities-nav__item">
                        <p class="opportunities-nav__title">ONLINE Бронирование<img src="/img/landing/plus.svg" alt=""></p>
                        <div class="opportunities-nav__text pt-2">
                            <ul style="list-style: circle; border-top: 1px solid #fff;" class="pt-2">
                                <li>WEB Регистрация</li>
                                <li>Выбор отделения</li>
                                <li>Выбор услуги</li>
                                <li>Выбор времени посещения</li>
                                <li>Получения кода авторизации</li>
                                <li>Посещение отделения</li>
                                <li>Обслуживание без очереди</li>
                            </ul>
                        </div>
                    </li>
                    <li class="opportunities-nav__item">
                        <p class="opportunities-nav__title">Рейтинг Сотрудников<img src="/img/landing/plus.svg" alt=""></p>
                        <div class="opportunities-nav__text pt-2">
                            <ul style="border-top: 1px solid #fff;" class="pt-2">
                                <li>Ежедневно, в конце рабочего дня на LCD панелях оповещения появляется итоговая таблица рейтинга на которой операторы могут видеть таблицу участвующих в рейтинге и расшифровку расчета.</li>
                                <li>Дополнительная мотивация для сотрудника стать лидером служебного соревнования.</li>
                            </ul>
                        </div>
                    </li>
                    <li class="opportunities-nav__item">
                        <p class="opportunities-nav__title">Аналитические Отчеты<img src="/img/landing/plus.svg" alt=""></p>
                        <div class="opportunities-nav__text pt-2">
                            <ul style="border-top: 1px solid #fff;" class="pt-2">
                                <li>Диаграмма количественных показателей и услуг.</li>
                                <li>Сводный отчет по нагрузке.</li>
                                <li>Распределение клиентов по дням.</li>
                                <li>Распределение потока клиентов по часам.</li>
                                <li>Использование рабочего времени, Аудиторский след.</li>
                                <li>Операторы получившие оценку «не приемлемо»</li>
                                <li>Обратная связь от клиента.</li>
                            </ul>
                        </div>
                    </li>
                    <li class="opportunities-nav__item">
                        <p class="opportunities-nav__title">Электронный Наставник<img src="/img/landing/plus.svg" alt=""></p>
                        <div class="opportunities-nav__text pt-2">
                            <ul style="border-top: 1px solid #fff;" class="pt-2">
                                <li>Работа данного модуля основывается на рейтинговых показателях операторов. Ежедневно информирует каждого оператора на какие показатели ему необходимо обратить особое внимание.</li>
                                <li>Повышает работоспособность сотрудников.</li>
                                <li>Понижает риск возникновения ошибок у операторов.</li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <ul class="opportunities-nav">
                    <li class="opportunities-nav__item">
                        <p class="opportunities-nav__title">Сервисное Обслуживание<img src="/img/landing/plus.svg" alt=""></p>
                        <div class="opportunities-nav__text pt-2">
                            <ul style="border-top: 1px solid #fff;" class="pt-2">
                                <li>В целях обеспечения бесперебойной работы СЭО предусмотрены три уровня технической поддержки в зависимости от степени сложности ситуации.</li>
                                <li>Мы находимся в 16 городах Республики Казахстан.</li>
                                <li>Наши сотрудники высоко квалифицированные специалисты.</li>
                                <li>Быстрая поддержка пользователей нашей системы электронной очереди а так же лояльный подход к каждому инциденту.</li>
                            </ul>
                        </div>
                    </li>
                    <li class="opportunities-nav__item">
                        <p class="opportunities-nav__title">Оценка Качества<img src="/img/landing/plus.svg" alt=""></p>
                        <div class="opportunities-nav__text pt-2">
                            <ul style="border-top: 1px solid #fff;" class="pt-2">
                                <li>Системой поддерживаются несколько типов и способов получения оценки качества – с использованием USB-сенсорных мониторов, с использованием механических пультов и через SMS.</li>
                                <li>Оценка качества привязана к конкретному талону, что позволяет получить полноценную аналитическую картину ситуации.</li>
                                <li>После нажатия на оценку «плохо», клиент может оставить комментарий. Предусмотрено исключение случайных оценок.</li>
                                <li> Специализированный компонент моментально уведомляет руководителя подразделения о появлении плохой оценки.</li>
                            </ul>
                        </div>
                    </li>
                    <li class="opportunities-nav__item">
                        <p class="opportunities-nav__title">Видео Банкинг<img src="/img/landing/plus.svg" alt=""></p>
                        <div class="opportunities-nav__text pt-2">
                            <ul style="border-top: 1px solid #fff;" class="pt-2">
                                <li>Автоматизация процесса дистанционного банковского обслуживания выдачи карт, требующих идентификации и сбора персональных данных клиента.</li>
                                <li>Уменьшение загруженности операционных залов, снижение нагрузки на специалистов операционной части и сокращение издержек на персонал.</li>
                                <li>Автоматическое логическое распределение клиентского потока.</li>
                                <li>Полный цикл оформления заявок и запросов практически на все розничные продукты банка, в том числе микро кредиты и займы.</li>
                            </ul>
                        </div>
                    </li>
                    <li class="opportunities-nav__item">
                        <p class="opportunities-nav__title">RATE CONTROL<img src="/img/landing/plus.svg" alt=""></p>
                        <div class="opportunities-nav__text pt-2">
                            <ul style="border-top: 1px solid #fff;" class="pt-2">
                                <li>Синхронизация курсов валют с внешней системой.</li>
                                <li>Формирование команд для каждого табло в соответствии с парой номер строки — валюта.</li>
                                <li>Получение и отправка команд.</li>
                                <li>После отправки курсов осуществляется контроль доставки информации в отделения, связь с которыми временно отсутствовала.</li>
                                <li>Синхронизация системного времени.</li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section-project">
    <div class="main-container">
        <div class="project">
            <div class="title">
                <div>
                    <p class="title-text">NOMAD system</p>
                    <p class="service-title">Наши проекты</p>
                    <p class="title-subText">Вы можете ознакомиться с нашими проектами нажав на нашу работу по внедрению системы электронной очереди</p>
                </div>
            </div>

            <div class="main-content serf">
                <div class="landing-slick">
                    <? foreach ($products as $product):?>
                        <div class="landing-slick__item">
                            <a href="<?= $product->alias?>" rel="nofollow">
                                <div class="img" style="background: url('<?= $product->image?>') no-repeat center center; width: 100%; height: 300px; background-size: cover; background-position: top center"></div>
                                <p style="font-size: 16px;text-align: left;"><?= $product->title?></p>
                            </a>
                        </div>
                    <? endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-order">
    <div class="main-container">
        <div class="order">
            <div class="title">
                <div>
                    <p class="title-text">NOMAD system</p>
                    <p class="service-title">Процедура заказа</p>
                    <p class="title-subText">Краткий обзор возможностей системы электронной очереди.</p>
                </div>
            </div>
            <div class="main-content order-content">
                <img class="d-none d-xl-block" src="/img/landing/order-1.webp" alt="">
                <div class="order-content__block">
                    <div class="order-card">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["src" => "/img/landing/order-2.jpg", "alt" => "Bass Technology Order 1" ]) ?>
                        <p class="order-card__title">Заполнить Заявку</p>
                        <p class="order-card__text">Нажмите кнопку Заказать в начале страницы чтобы заполнить заявку и отправить ее нам.</p>
                    </div>
                    <div class="order-card">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["src" => "/img/landing/order-3.jpg", "alt" => "Bass Technology Order 2" ]) ?>
                        <p class="order-card__title">Коммерческое Предложение</p>
                        <p class="order-card__text">Мы подготовим для Вас специальное коммерческое предложение которое Вас заинтересует.</p>
                    </div>
                    <div class="order-card 	order-card d-block d-xl-block">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["src" => "/img/landing/order-4.jpg", "alt" => "Bass Technology Order 3" ]) ?>
                        <p class="order-card__title">Официальный Договор</p>
                        <p class="order-card__text">Гарантом наших обязательств будет выступать официальный договор подписанный с двух сторон.</p>
                    </div>
                    <div class="order-card order-card d-block d-xl-block">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["src" => "/img/landing/order-5.jpg", "alt" => "Bass Technology Order 4" ]) ?>
                        <p class="order-card__title">Готовое Решение</p>
                        <p class="order-card__text">Вы получите готовое решение под ключ, нашей системы электронной очереди.</p>
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
                    <p class="title-text">Оборудования</p>
                    <p class="service-title">Популярные товары</p>
                </div>
                <a class="button" href="/catalog/">Все товары</a>
            </div>

            <div class="main-content product-content">
                <?foreach ($items as $item):?>
                <div class="main-card">
                    <?if($item->getMainImage() && strlen($item->getMainImage()) > 0):?>
                        <?= \PELock\ImgOpt\ImgOpt::widget(["src" => $item->getMainImage(), "alt" => $item->title ]) ?>
                    <?endif;?>
                    <p class="main-card__title" style="margin-bottom: 10px;"><a  href="<?=$item->category->alias .'/'. $item->alias;?>/"><?=$item->title?></a></p>
                    <p class="main-card__text" style="color: grey; margin-bottom: 10px"><?=$item->category->title?></p>
                    <a class="button-main button-blue" href="<?=$item->category->alias .'/'. $item->alias;?>/" style="text-align: center;">Посмотреть</a>
                </div>
                <?endforeach;?>
            </div>
        </div>
    </div>
</section>

<section class="section-serf">
    <div class="main-container">
        <div class="serf">
            <div class="title">
                <div>
                    <p class="title-text">О нас</p>
                    <p class="service-title">СЕРТИФИКАТЫ</p>
                </div>
            </div>
            <div class="main-content">
                <div class="landing-slick">
                    <div class="landing-slick__item">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["lightbox_data" => "image-1", "lightbox_src" => "/img/certificates/altynsapa_bass_technology.jpg", "src" => "/img/certificates/mini/altynsapa_bass_technology.jpg", "alt" => "Сертификат Алтын Сапа Bass Technology" ]) ?>
                    </div>
                    <div class="landing-slick__item">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["lightbox_data" => "image-1", "lightbox_src" => "/img/certificates/сертификат_соответсвия_bass_technology.jpg", "src" => "/img/certificates/mini/сертификат_соответсвия_bass_technology.jpg", "alt" => "Сертификат соответсвия Bass Technology" ]) ?>
                    </div>
                    <div class="landing-slick__item">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["lightbox_data" => "image-1", "lightbox_src" => "/img/certificates/сертификат_регистрации_bass_technology.jpg", "src" => "/img/certificates/mini/сертификат_регистрации_bass_technology.jpg", "alt" => "Сертификат регистрации Bass Technology" ]) ?>
                    </div>
                    <div class="landing-slick__item">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["lightbox_data" => "image-1", "lightbox_src" => "/img/certificates/евразийский_экономически_союз_bass_technology.jpg", "src" => "/img/certificates/евразийский_экономически_союз_bass_technology.jpg", "alt" => "Сертификат соответсвия от Евразийского экономического союза Bass Technology" ]) ?>
                    </div>
                    <div class="landing-slick__item">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["lightbox_data" => "image-1", "lightbox_src" => "/img/certificates/свидетельство_bass_technology.jpg", "src" => "/img/certificates/mini/свидетельство_bass_technology.jpg", "alt" => "Свидетельство о государственной регистрации прав на объект авторского права Bass Technology" ]) ?>
                    </div>
                    <div class="landing-slick__item">
                        <?= \PELock\ImgOpt\ImgOpt::widget(["lightbox_data" => "image-1", "lightbox_src" => "/img/certificates/сертификат_товара_bass_technology.jpg", "src" => "/img/certificates/mini/сертификат_товара_bass_technology.jpg", "alt" => "Сертификат о происхождении товара Bass Technology" ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-blue section-contacts">
    <div>
        <div class="contacts">
            <div class="main-content">
                <div class="main-container contacts-block">
                    <div class="contacts-block__over">
                        <?foreach ($settings->getPhoneNumbers() as $phoneNumber):?>
                            <a href="tel:<?=str_replace(' ', '', $phoneNumber);?>" rel="nofollow"><p><?=$phoneNumber;?></p></a>
                        <?endforeach;?>
                    </div>
                    <p class="contacts-block__text"><?=$settings->address;?></p>
                    <p class="contacts-block__text"><?=$settings->email;?></p>
                    <a class="button-main button-blue" href="#" data-toggle="modal" data-target="#contact-me" rel="nofollow">Оставить заявку</a>
                </div>
            </div>
        </div>
    </div>
</section>