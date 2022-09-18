<?php
$settings = \frontend\models\FrontendHelper::getSetting();
$categoryList = \common\models\Category::find()->all();
?>

<footer class="text-white">
    <div class="container-fluid">


        <?if(Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index'):?>
            <section class="section-ticket text-dark">
            <div class="container-fluid">
                <div class="ticket-block">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="calendar mt-3 justify-content-between mb-5"
                                 style="box-shadow: -1px -1px 12px -5px;">
                                <div>
                                    <p class="min-title ff-bold">Дата посещения</p>
                                    <p class="txt-18 txt-green-200 txt-violet-200">21.07.2022</p>
                                </div>
                                <img class="ml-0" src="/img/main/main-calendar.svg" alt="">
                            </div>
                        </div>
                        <ul class="col-12">
                            <li>
                                <p>Взрослые билеты от 18 лет 500 тг за одну персону</p>
                            </li>
                            <li>
                                <p> Студенческие билеты для гостей со студенческим билетом 375 тг</p>
                            </li>
                            <li>
                                <p> Школьные билеты для гостей от 7 до 18 лет 250 тг</p>
                            </li>
                            <li>
                                <p>Инвалиды и дети дошкольного возраста 0 тг (бесплатно)</p>
                            </li>
                        </ul>
                    </div>

                    <div class="row mb-5">
                        <div class="col-12 col-xl-6 mb-3">
                            <div class="section-ticket-pay">
                                <p class="txt-26 ff-bold">Взрослый билет</p>
                                <div class="ticket-pay-block">
                                    <p class="mr-5 txt-26 ff-bold">500 тг </p>

                                    <div class="ticket-pay-input">
                                        <div class="circle center circle-minus">-</div>
                                        <input type="text">
                                        <div class="circle center circle-plus">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6 mb-3">
                            <div class="section-ticket-pay">
                                <p class="txt-26 ff-bold">Взрослый билет</p>
                                <div class="ticket-pay-block">
                                    <p class="mr-5 txt-26 ff-bold">500 тг </p>

                                    <div class="ticket-pay-input">
                                        <div class="circle center circle-minus">-</div>
                                        <input type="text">
                                        <div class="circle center circle-plus">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6 mb-3">
                            <div class="section-ticket-pay">
                                <p class="txt-26 ff-bold">Взрослый билет</p>
                                <div class="ticket-pay-block">
                                    <p class="mr-5 txt-26 ff-bold">500 тг </p>

                                    <div class="ticket-pay-input">
                                        <div class="circle center circle-minus">-</div>
                                        <input type="text">
                                        <div class="circle center circle-plus">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6 mb-3">
                            <div class="section-ticket-pay">
                                <p class="txt-26 ff-bold">Взрослый билет</p>
                                <div class="ticket-pay-block">
                                    <p class="mr-5 txt-26 ff-bold">500 тг </p>

                                    <div class="ticket-pay-input">
                                        <div class="circle center circle-minus">-</div>
                                        <input type="text">
                                        <div class="circle center circle-plus">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <p class="txt-20-w6 text-left">Укажите email для получения билетов</p>
                            <br>
                            <input class="ticket-block-input" type="text" placeholder="Email">
                            <br>
                            <br>
                            <input type="checkbox">
                            <span class="txt-20-w4 ml-2">Я даю согласие на оброботку персональных данных соглашаюсь
                                    <a class="txt-violet-100 ml-1" href="">политикой
                                        конфеденциальности</a></span>
                        </div>
                        <div class="col-12 col-md-6 pt-4 text-left text-md-right">
                            <p class="mb-3 ff-bold txt-26 mb-5">Итого : <span
                                        class="ml-2 ff-bold txt-26 txt-violet-100">2300 тг </span></p>
                            <a href="/pay.html"
                               class="form-btn green-200-bg min-title ff-bold text-white center ml-0">Купить
                                билет</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?endif;?>

        <div class="row">
            <div class="col-12 col-md-3 text-center text-md-left mb-5">
                <a class="navbar-brand header-logo" href="#"><img src="/img/main/logo.png" alt=""></a>
                <p class="d-none d-md-block">Национальный парк <br> кольсай кольдеры</p>
                <ul class="footer-soc">
                    <li class="footer-soc-item circle center"><img src="/img/footer/soc-inst.svg" alt=""></li>
                    <li class="footer-soc-item circle center"><img src="/img/footer/soc-teleg.svg" alt=""></li>
                    <li class="footer-soc-item circle center"><img src="/img/footer/soc-inst.svg" alt=""></li>
                    <li class="footer-soc-item circle center"><img src="/img/footer/soc-teleg.svg" alt=""></li>
                </ul>
            </div>
            <div class="col-12 col-md-3 text-center text-md-left">
                <ul>
                    <li class="footer-title">
                        <p>ПРЕСС - ЦЕНТР</p>
                    </li>
                    <li class="footer-text">
                        <p>Новости </p>
                    </li>
                    <li class="footer-text">
                        <p>Блог руководителя</p>
                    </li>
                    <li class="footer-text">
                        <p>Вопросы коррупции</p>
                    </li>
                    <li class="footer-text">
                        <p>СМИ о нас </p>
                    </li>
                    <li class="footer-text">
                        <p>Вакансии </p>
                    </li>
                </ul>
                <ul class="my-5">
                    <li class="footer-title">
                        <p>О парке</p>
                    </li>
                    <li class="footer-text">
                        <p>Новости </p>
                    </li>
                    <li class="footer-text">
                        <p>История парка </p>
                    </li>
                    <li class="footer-text">
                        <p>Структура</p>
                    </li>
                    <li class="footer-text">
                        <p>Генеральный план p>
                    </li>
                    <li class="footer-text">
                        <p>Тендерные и конкурсные документы </p>
                    </li>
                    <li class="footer-text">
                        <p>Режим работы </p>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-3 text-center text-md-left">
                <ul>
                    <li class="footer-title">
                        <p>нАУКА - ЗАЩИТА</p>
                    </li>
                    <li class="footer-text">
                        <p>Красная книга </p>
                    </li>
                    <li class="footer-text">
                        <p>Научные статьи </p>
                    </li>
                    <li class="footer-text">
                        <p>Флора </p>
                    </li>
                </ul>

                <ul class="my-5">
                    <li class="footer-title">
                        <p>туризм</p>
                    </li>
                    <li class="footer-text">
                        <p>Фауна </p>
                    </li>
                    <li class="footer-text">
                        <p>Паспорта маршрутов </p>
                    </li>
                    <li class="footer-text">
                        <p>Услуги парка </p>
                    </li>
                    <li class="footer-text">
                        <p>Куда можно пойти</p>
                    </li>
                    <li class="footer-text">
                        <p>Нормативно - правовая база </p>
                    </li>
                    <li class="footer-text">
                        <p>Правила посещение </p>
                    </li>
                </ul>
            </div>


            <div class="col-12 col-md-3 text-center text-md-left">
                <ul>
                    <li class="footer-title">
                        <p>Сотрудничество</p>
                    </li>
                    <li class="footer-text">
                        <p> Акция марш парков </p>
                    </li>
                    <li class="footer-text">
                        <p>Школьные лесничества </p>
                    </li>
                    <li class="footer-text">
                        <p>Экологические акции </p>
                    </li>
                    <li class="footer-text">
                        <p> Волонтеры</p>
                    </li>
                    <li class="footer-text">
                        <p> продвижение культуры </p>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="my-5 bg-light" style="width: 100%;">
        <div class="d-flex justify-content-between">
            <p>Колсай колдеры</p>
            <p>история парка</p>
        </div>
</footer>
