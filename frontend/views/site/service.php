<?php

/* @var $this yii\web\View */
//Первый уровень
/* @var $contactLists common\models\Contacts[]*/
//Второй уровень
/* @var $cityLists common\models\Contacts[] */
//Третий уровень
/* @var $specLists common\models\Contacts[] */

use yii\helpers\Html;

$this->params['breadcrumbs'][] = $this->title;

$js = <<<JS
    const serviceList = document.querySelectorAll('.service-list___card');
    const advantageCard = document.querySelectorAll('.advantage-card');

    serviceList.forEach(e => {
        e.addEventListener('click', accordionOnClick)
    }) 
    advantageCard.forEach(e => {
        e.addEventListener('click', accordionClick)
    }) 

    function accordionOnClick(item){
        $(this).find('.service-list__nav').toggle(500);
        $(this).find('.service-list__nav').toggleClass("open", 1500);
    }
    function accordionClick(item){
        $(this).find('.advantage-card__text').toggle(500);
        $(this).find('.advantage-card__text').toggleClass("open", 1500);
    }

JS;

$this->registerJs($js);
\frontend\components\BreadCrumbsHelper::addBreadCrumbList();
?>
<div class="site-about">
    <div class="main-container">
        <div class="title site">
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="sub-title-site-about">В целях обеспечения бесперебойной работы СЭО предусмотрены три уровня технической поддержки в зависимости от степени сложности ситуации:</div>
        </div>
    </div>

    <section>
        <div class="main-container">
            <div class="srervice-card__block">
                <div class="main-card">
                    <div style="
                    background: url('/img/service/contactImage.png') no-repeat center center;
                    background-position: center;
                    background-size: contain;
                    width: 150px;
                    height: 150px"></div>
                    <div class="product-line__card"></div>
                    <p class="main-card__title">Консультация</p>
                    <p class="main-card__text">Вы можете оставить заявку или позвонить самостоятельно для подровной консультаций</p>
                    <a href="#firstAchor" class="service-button">перейти</a>
                </div>
                <div class="main-card">
                    <div style="
                    background: url('/img/service/carImage.png') no-repeat center center;
                    background-position: center;
                    background-size: contain;
                    width: 150px;
                    height: 150px"></div>
                    <div class="product-line__card"></div>
                    <p class="main-card__title">Встреча со специалистом</p>
                    <p class="main-card__text">Специалист приезжает на место при необходимости для оказания услуг по обслуживанию или настройке Nomad</p>
                    <a href="#secondAnchor" class="service-button">перейти</a>
                </div>
                <div class="main-card">
                    <div style="
                    background: url('/img/service/specImage.png') no-repeat center center;
                    background-position: center;
                    background-size: contain;
                    width: 150px;
                    height: 150px"></div>
                    <div class="product-line__card"></div>
                    <p class="main-card__title">Диагностика системы</p>
                    <p class="main-card__text">Привлечение специалистов  отдела разработки для устранения выявленных ошибок в работе Nomad</p>
                    <a href="#thirdAnchor" class="service-button">перейти</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="main-container">
            <div class="title">
                <div>
                    <p class="title-text"> NOMAD system</p>
                    <span class="service-title">Преимущество</span>
                </div>
            </div>
            <div class="main-content main-advantage">
                <div class="advantage-card">
                    <div class="advantage-card__top">
                        <img src="/img/service/shield.svg" alt="" class="advantage-card__img">
                        <p class="advantage-card__title">Безотказность</p>
                    </div>
                    <p class="advantage-card__text d-none d-lg-block">Обеспечить бесперебойную работу централизованной системы электронного
                        управления очередями «NOMAD» с обеспечением автоматической отправки сформированных отчетов.
                        Предотвращение отказа от работы и преждевременного износа оборудования</p>
                    <div class="advantage-card__toggle">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="advantage-card">
                    <div class="advantage-card__top">
                        <img src="/img/service/shield.svg" alt="" class="advantage-card__img">
                        <p class="advantage-card__title">Работы и Услуги</p>
                    </div>
                    <p class="advantage-card__text">Работы и услуги по техническому обслуживанию оборудования и
                        сопровождению программного обеспечения системы электронная очереди включают замену запасных запчастей для оборудования СЭО «NOMAD».</p>
                    <div class="advantage-card__toggle">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="advantage-card">
                    <div class="advantage-card__top">
                        <img src="/img/service/shield.svg" alt="" class="advantage-card__img">
                        <p class="advantage-card__title">Консультация</p>
                    </div>
                    <p class="advantage-card__text">Консультирование пользователей по работе с Системой.</p>
                    <div class="advantage-card__toggle">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="advantage-card">
                    <div class="advantage-card__top">
                        <img src="/img/service/shield.svg" alt="" class="advantage-card__img">
                        <p class="advantage-card__title">Условия</p>
                    </div>
                    <p class="advantage-card__text">Технические характеристики изменению и дополнению не подлежат.</p>
                    <div class="advantage-card__toggle">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="advantage-card">
                    <div class="advantage-card__top">
                        <img src="/img/service/shield.svg" alt="" class="advantage-card__img">
                        <p class="advantage-card__title">Формат обслуживания</p>
                    </div>
                    <p class="advantage-card__text">Формат сервисного обслуживания: устранение неисправностей по заявке Заказчика системы электронного управления очередями «NOMAD».</p>
                    <div class="advantage-card__toggle">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="advantage-card">
                    <div class="advantage-card__top">
                        <img src="/img/service/shield.svg" alt="" class="advantage-card__img">
                        <p class="advantage-card__title">Объем работ</p>
                    </div>
                    <p class="advantage-card__text">Услуги по объему, количеству и качеству, поставляемые в рамках закупок, должны соответствовать данной технической спецификации, являющейся неотъемлемой частью Договора.</p>
                    <div class="advantage-card__toggle">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="advantage-card">
                    <div class="advantage-card__top">
                        <img src="/img/service/shield.svg" alt="" class="advantage-card__img">
                        <p class="advantage-card__title">Ситуационный центр</p>
                    </div>
                    <p class="advantage-card__text">Подключение «Ситуационного центра» для интеграции к центральному серверу находящемся в Министерстве труда и социальной защиты населения Республики Казахстан город Астана.</p>
                    <div class="advantage-card__toggle">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="advantage-card">
                    <div class="advantage-card__top">
                        <img src="/img/service/shield.svg" alt="" class="advantage-card__img">
                        <p class="advantage-card__title">Оплата Услуг</p>
                    </div>
                    <p class="advantage-card__text">Оплата за оказанные услуги осуществляется по факту наличия заявок на обслуживание и/или ремонт системы электронного управления очередями «NOMAD».</p>
                    <div class="advantage-card__toggle">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="main-container">
            <div class="title">
                <div>
                    <p class="title-text"> NOMAD system</p>
                    <span class="service-title">Соглашение об уробне сервисов</span>
                </div>
            </div>
            <div class="main-content service-block" style="margin-top: 20px">
                <div>
                    <p class="service-title" style="color: #1C7A95">Цель:</p>
                    <p class="service-block__text">Обеспечение гарантированной постоянной технической поддержки</p>
                </div>
                <div>
                    <p class="service-title" style="color: #1C7A95">Задачи:</p>
                    <p class="service-block__text">Техническое сопровождение (Далее - ТС) : Служба трехуровневой технической поддержки (далее - Служба SD),
                        для оперативного содействия в решении возникших инцидентов</p>
                </div>
            </div>
            <div class="main-content"  style="color: #1C7A95">
                <p class="service-title">Описание сервисов: </p>

                <div class="service-list">
                    <div class="service-list___card">
                        <p class="list-card__title">Сервер системы электронного управления очередями «NOMAD»  <img src="/img/service/plus-service.svg" alt="" class="list-card__img"></p>
                        <ul class="service-list__nav">
                            <li>1) Чистка системного блока сервера и диспенсера талонов.</li>
                            <li>2) Проверка коммутации в серверном узле СЭО.</li>
                            <li>3) Диагностика и тестирование системы и оборудования.</li>
                            <li>4)Проверка конденсаторов и блоков питания.</li>
                            <li>5) Осмотр внешнего состояния процессора, вентиляторов на присутствие посторонних шумов и физических дефектов.</li>
                            <li>6) Вскрытие системного блока и осуществление продувки от пыли.</li>
                        </ul>
                    </div>
                    <div class="service-list___card">
                        <p class="list-card__title">Диспенсер талонов системы электронного управления очередями «NOMAD» <img src="/img/service/plus-service.svg" alt="" class="list-card__img"></p>
                        <ul class="service-list__nav">
                            <li class="service-list__item">1) Тестирование устройств.</li>
                            <li class="service-list__item">2) Внутренняя чистка узлов.</li>
                            <li class="service-list__item">3) Проверка всех соединительных проводов.</li>
                            <li class="service-list__item">4) Профилактика принтера.</li>
                            <li class="service-list__item">5) Установка и настройка драйверов сенсорного монитора и принтера.</li>
                            <li class="service-list__item">6) Диагностика оборудования (оперативной памяти, винчестера, процессора)</li>
                            <li class="service-list__item">7) Оптимизация параметров установленной операционной системы (отключение дополнительных служб приложений)</li>
                            <li class="service-list__item">8) снятие защитных кожухов.</li>
                            <li class="service-list__item">9) продувка оборудования от пыли.</li>
                            <li class="service-list__item">10) снятие загустевшей смазки.</li>
                            <li class="service-list__item">11) Промывка загрязненных деталей и механизмов бензином или спиртом в зависимости от конструкции машины и промываемых деталей.</li>
                            <li class="service-list__item">12) Визуальный осмотр     технического     состояния     деталей, узлов, механизмов и электронных плат.</li>
                            <li class="service-list__item">13) Смазка ПК    в    соответствии    с    требованиями    технической документации.</li>
                            <li class="service-list__item">14) Удаление загрязнений с корпусов и съемных крышек.</li>
                        </ul>
                    </div>
                    <div class="service-list___card">
                        <p class="list-card__title">Панель для оценки качества – сенсорный монитор <img src="/img/service/plus-service.svg" alt="" class="list-card__img"></p>
                        <ul class="service-list__nav">
                            <li class="service-list__item">1) Обновление версии драйвера.</li>
                            <li class="service-list__item">2) Удаление пыли с сенсорных дисплеев.</li>
                            <li class="service-list__item">3) Диагностика на наличие программных ошибок.</li>
                            <li class="service-list__item">4) Установка и настройка сенсорного монитора.</li>
                            <li class="service-list__item">5) Калибровка сенсорного экрана.</li>
                        </ul>
                    </div>
                    <div class="service-list___card">
                        <p class="list-card__title">Периферийное оборудование (табло, интерфейсная плата)  <img src="/img/service/plus-service.svg" alt="" class="list-card__img"></p>
                        <ul class="service-list__nav">
                            <li class="service-list__item"> 1) Диагностика и тестирование.</li>
                            <li class="service-list__item">2)  Устранение ошибок.</li>
                        </ul>
                    </div>
                    <div class="service-list___card">
                        <p class="list-card__title">Работы по оперативному вызову сотрудника и время реагирования  <img src="/img/service/plus-service.svg" alt="" class="list-card__img"></p>
                        <ul class="service-list__nav">
                            <li class="service-list__item">1) Консультация по телефону «Горячей линии»</li>
                            <li class="service-list__item">2) Регистрация заявок, согласование приоритетов заявок.</li>
                        </ul>
                    </div>
                    <div class="service-list___card">
                        <p class="list-card__title">Работы по доработке или исправлению ошибок программного обеспечения <img src="/img/service/plus-service.svg" alt="" class="list-card__img"></p>
                        <ul class="service-list__nav">
                            <li class="service-list__item">1) Исправление обнаруженных ошибок.</li>
                            <li class="service-list__item">2) Тестирование программного обеспечения.</li>
                            <li class="service-list__item">3) Исправление обнаруженных ошибок.</li>
                            <li class="service-list__item">4) Тестирование программного обеспечения.</li>
                            <li class="service-list__item">5) Добавление новых форм отчетности, изменения существующих отчетов.</li>
                            <li class="service-list__item">6) Разработка и внедрение нового дизайна внутреннего интерфейса приложений ПО СЭО NOMAD (на базе существующего программного обеспечения) без права замены программного обеспечения другого поставщика ПО СЭО.</li>
                            <li class="service-list__item">7) Адаптация программных модулей для ежедневной работы операторов очереди - инспекторов.</li>
                            <li class="service-list__item">8) Обновление программного обеспечения согласно письма -регламента от завода производителя СЭО «NOMAD»</li>
                            <li class="service-list__item">9) Обновление лицензионного программного обеспечения (согласно регламента завода производителя СЭО на базе существующего и установленного у Заказчика программного обеспечения)</li>
                            <li class="service-list__item">10) Иметь техническую возможность обеспечить обслуживание и бесперебойную работу существующей, специализированной системы электронного управления очереди «NOMAD» без права замены программного обеспечения на иное.</li>
                            <li class="service-list__item">11) Дистанционное перенастройка СЭО «NOMAD» по выделенному каналу VPN в связи с выделением добавленных услуг, обновлению ПО и лицензирования.</li>
                        </ul>
                    </div>
                    <div class="service-list___card">
                        <p class="list-card__title">Требования к штату и АСУ «Service Desk» <img src="/img/service/plus-service.svg" alt="" class="list-card__img"></p>
                        <ul class="service-list__nav">
                            <li class="service-list__item">1) В наличии комплекс модулей и приложений централизованной системы контроля потока посетителей для незамедлительного восстановления работоспособности всей системы или каждого компонента в отдельности.</li>
                            <li class="service-list__item">2) Наличие квалифицированных специалистов для своевременного устранения ошибок системы.</li>
                            <li class="service-list__item">3) Иметь техническую возможность обеспечить обслуживание и бесперебойную работу существующей, специализированной системы без права замены программного обеспечения на иное с возможностью обновления до последней версии.</li>
                            <li class="service-list__item">4) В составе Службы SD должен быть назначен координатор, выполняющий следующие функции.</li>
                            <li class="service-list__item">5) Регистрация Заявок по инцидентам/заявкам на обслуживание.</li>
                            <li class="service-list__item">6) Координирование проводимых работ – выявление и согласование с Заказчиком приоритетных работ.</li>
                            <li class="service-list__item">7) Оповещение Заказчика о планируемых работах и о произошедших сбоях, причинах и об устранении неисправностей по телефону или на электронный адрес.</li>
                            <li class="service-list__item">8) Опыт работы в данном виде услуг у потенциального поставщика должен быть не менее 5-ти лет, подтверждение предоставляется в виде счет фактур на оказанные услуги.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-blue section-task">
        <div class="main-container">
            <div class="advantage">
                <div class="advantage-content">
                    <div class="title">
                        <div>
                            <p class="title-text">NOMAD system</p>
                            <span class="service-title">Время выполнение задач</span>
                        </div>
                    </div>
                    <div class="advantage-content__block main-content">
                        <ul class="advantage-nav">
                            <li class="advantage-nav__item d-flex justify-content-between">
                                <p class="advantage-nav__text">Режим обслуживания:</p>
                                <div class="advantage-nav__subItem">
                                    <p>С 09:00-18:00 <span class="info d-block d-lg-none">в рабочие дни</span></p>
                                </div>
                            </li>
                            <li class="advantage-nav__item d-flex justify-content-between">
                                <p class="advantage-nav__text">Время реакций:</p>
                                <div class="advantage-nav__subItem">
                                    <p>До 2  часов<span class="info d-block d-lg-none">в рабочие дни</span></p>
                                </div>
                            </li>
                            <li class="advantage-nav__item d-flex justify-content-between">
                                <p class="advantage-nav__text">Время прибытия:</p>
                                <div class="advantage-nav__subItem">
                                    <p>До 16  часов<span class="info d-block d-lg-none">в рабочие дни</span></p>
                                </div>
                            </li>
                            <li class="advantage-nav__item d-flex justify-content-between">
                                <p class="advantage-nav__text">Время восстановления:</p>
                                <div class="advantage-nav__subItem">
                                    <p>До 8 часов<span class="info d-block d-lg-none">в рабочие дни</span></p>
                                </div>
                            </li>
                            <li class="advantage-nav__item d-flex justify-content-between">
                                <p class="advantage-nav__text">Профилактика:</p>
                                <div class="advantage-nav__subItem">
                                    <p>2 раза в год </p>
                                    <div class="d-block d-lg-none">
                                        <img src="/img/service/arrow-success.svg" alt=""><span class="info d-inline-block d-lg-none">включено</span>
                                    </div>
                                </div>
                            </li>
                            <li class="advantage-nav__item d-flex justify-content-between">
                                <p class="advantage-nav__text">Консультация:</p>
                                <div class="advantage-nav__subItem">
                                    <div>
                                        <img src="/img/service/arrow-success.svg" alt=""><span class="info d-inline-block d-lg-none">включено</span>
                                    </div>
                                </div>
                            </li>
                            <li class="advantage-nav__item d-flex justify-content-between">
                                <p class="advantage-nav__text">Запасные части:</p>
                                <div class="advantage-nav__subItem">
                                    <img src="/img/service/ban.svg" alt="">
                                    <span class="info-t d-inline-block d-lg-none">Невключено</span>
                                </div>
                            </li>
                            <li class="advantage-nav__item d-flex justify-content-between">
                                <p class="advantage-nav__text">Добавление рабочих мест:</p>
                                <div class="advantage-nav__subItem">
                                    <img src="/img/service/ban.svg" alt="">
                                    <span class="info-t d-inline-block d-lg-none">Невключено</span>
                                </div>
                            </li>
                            <li class="advantage-nav__item d-flex justify-content-between">
                                <p class="advantage-nav__text">Обновление до последней версии ПО:</p>
                                <div class="advantage-nav__subItem">
                                    <img src="/img/service/ban.svg" alt="">
                                    <span class="info-t d-inline-block d-lg-none">Невключено</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <img class="d-none d-lg-block"  style="width: 50%;" src="/img/service/hand2.svg" alt="">
                <img class="d-block d-lg-none" style="width: 80%;" src="/img/service/hand.svg" alt="">
            </div>
        </div>
    </section>

    <section>
        <div class="main-container" id="firstAchor">
            <div class="title">
                <div>
                    <p class="title-text">1 уровень</p>
                    <span class="service-title">Консультация</span>
                </div>
            </div>

            <p>Консультация по всем доступным средствам связи и удаленное устранение причин инцидентов, ответы на вопросы, касающиеся технической поддержки Системы по телефону или по электронной почте; </p>

            <div class="main-consultation" style="justify-content: center">
                <?foreach ($contactLists as $contactList):?>
                    <div class="main-card">
                        <div class="main-card__img" style="
                                background: url(<?= $contactList->image ? $contactList->image : '/img/service/contactImage.png'?>) no-repeat center center;
                                background-position: center;
                                background-size: contain;
                                max-width: 150px"></div>
                        <div class="product-line__card"></div>
                        <p class="main-card__title"><?=$contactList->title?></p>
                        <p class="main-card__subTitle"><?=$contactList->position?></p>
                        <p class="maiin-card-text"><?=$contactList->number?></p>
                        <p class="maiin-card-text"><?=$contactList->email?></p>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    </section>
    <section>
        <div class="main-container" id="secondAnchor">
            <div class="title">
                <div>
                    <p class="title-text">2 уровень</p>
                    <span class="service-title">Встреча со специалистом</span>
                </div>
            </div>

            <p>Консультация по всем доступным средствам связи и удаленное устранение причин инцидентов, ответы на вопросы, касающиеся технической поддержки Системы по телефону или по электронной почте; </p>

            <?=$this->render('service_map', ['cityLists' => $cityLists]);?>
        </div>
    </section>
    <section>
        <div class="main-container" id="thirdAnchor">
            <div class="title">
                <div>
                    <p class="title-text">3 уровень</p>
                    <span class="service-title">Встреча со специалистом</span>
                </div>
            </div>

            <p>Выезд специалиста Исполнителя при необходимости для оказания услуг
                по обслуживанию или настройке специализированного программного
                обеспечения системы электронной очереди сервисных центров по Республике Казахстан </p>

            <div class="main-consultation main-container" style="justify-content: start;">
                <?foreach ($specLists as $specList):?>
                <div class="main-card">
                    <div class="main-card__img" style="
                        background: url(<?= $specList->image ? $specList->image : '/img/service/specImage.png'?>) no-repeat center center;
                        background-position: center;
                        background-size: contain;
                        max-width: 150px"></div>
                    <div class="product-line__card"></div>
                    <p class="main-card__title"><?=$specList->title?></p>
                    <p class="main-card__subTitle"><?=$specList->position?></p>
                    <p class="maiin-card-text"><?=$specList->number?></p>
                    <p class="maiin-card-text"><?=$specList->email?></p>
                </div>
                <?endforeach;?>
            </div>
        </div>
    </section>

</div>
