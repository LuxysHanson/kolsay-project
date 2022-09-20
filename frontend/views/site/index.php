<?php
/* @var $this yii\web\View*/
/* @var $partners common\models\Partners*/
/* @var $products common\models\Products*/
/* @var $items common\models\Items[]*/
$settings = \frontend\models\FrontendHelper::getSetting();
$js = <<<JS
$(window).on('load scroll', function() {
    if ($(this).scrollTop() >= '900') {
        $('header').addClass('header-dark');
    } else {
        $('header').removeClass();
    }
});
JS;
$this->registerJs($js);

?>

<main>
    <section class="main-section">
        <div class="container fluid center" style="height: 100vh; flex-direction: column;">
            <h1 class="text-center h1-title">Көлсай көлдері</h1>
            <p class="text-white text-center mb-5">Открой для себя Көлсай. Идеальное путешествие для ценителей
                природы</p>
            <a class="btn-link-yallow" href="/tiket.html"> Купить билет</a>
        </div>
        <div class="cloud d-flex">
            <img src="/img/main/cloud.svg" alt="">
            <p class="center h5-title">32º</p>
        </div>
    </section>

    <section class="section-our-tour">
        <div class="our-tour-block">
            <div class="our-tour-item order-1">
                <img src="/img/main/main-img-1.jpg" alt="">
            </div>
            <div class="our-tour-item center order-2">
                <div class="item ml-2">
                    <p class="h4-title mb-3">Озеро Кольсай</p>
                    <p class="txt-22-w4 mb-4">Кольсайские озера называют «жемчужиной Северного Тянь-Шаня».
                        Но на самом деле это даже не жемчужина, а настоящее ожерелье: ведь озер – три!</p>
                    <p>ПОДРОБНЕЕ О МАРШРУТЕ</p>
                </div>
            </div>
            <div class="our-tour-item center order-4 order-md-3">
                <div class="item ml-3">
                    <p class="h4-title mb-3">Озеро Кольсай</p>
                    <p class="txt-22-w4 mb-4">Кольсайские озера называют «жемчужиной Северного Тянь-Шаня».
                        Но на самом деле это даже не жемчужина, а настоящее ожерелье: ведь озер – три!</p>
                    <p>ПОДРОБНЕЕ О МАРШРУТЕ</p>
                </div>
            </div>
            <div class="our-tour-item d-flex justify-content-end order-3 order-mg-4">
                <img src="/img/main/main-img-2.jpg" alt="">
            </div>
            <div class="our-tour-item order-5">
                <img src="/img/main/main-img-3.jpg" alt="">
            </div>
            <div class="our-tour-item center order-6">
                <div class="item">
                    <p class="h4-title mb-3">Озеро Кольсай</p>
                    <p class="txt-22-w4 mb-4">Кольсайские озера называют «жемчужиной Северного Тянь-Шаня».
                        Но на самом деле это даже не жемчужина, а настоящее ожерелье: ведь озер – три!</p>
                    <p>ПОДРОБНЕЕ О МАРШРУТЕ</p>
                </div>
            </div>
            <div class="our-tour-item center order-8 order-md-7">
                <div class="item ml-3">
                    <p class="h4-title mb-3">Озеро Кольсай</p>
                    <p class="txt-22-w4 mb-4">Кольсайские озера называют «жемчужиной Северного Тянь-Шаня».
                        Но на самом деле это даже не жемчужина, а настоящее ожерелье: ведь озер – три!</p>
                    <p>ПОДРОБНЕЕ О МАРШРУТЕ</p>
                </div>
            </div>
            <div class="our-tour-item d-flex justify-content-end order-7 order-md-8">
                <img src="/img/main/main-img-4.jpg" alt="">
            </div>
            <img class="main-lines d-none d-md-block" src="/img/main/main-lines.svg" alt="">
        </div>
    </section>
    <section class=" p-0">
        <img style="width: 100%;" src="/img/main/mountain.png" alt="">
    </section>


    <section class="section-path">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 center">
                    <ul class="section-path-list ff-bold">
                        <li class="path-list-item active"><span class="mr-2">01.</span>Как добраться</li>
                        <li class="path-list-item d-none d-lg-block"><span class="mr-2">02.</span>Кайнды</li>
                        <li class="path-list-item d-none d-lg-block"><span class="mr-2">03.</span>Кольсай</li>
                        <li class="path-list-item d-none d-lg-block"><span class="mr-2">04.</span>Саты</li>
                        <li class="path-list-item d-none d-lg-block"><span class="mr-2">04.</span>Курмет</li>
                    </ul>
                    <div class="path-num-box ">
                        <p class="path-num ff-bold">01</p>
                        <div class="d-flex align-items-center path-num-block">
                            <div class="circle center circle-main"><img src="/img/main/path-arrow-left.svg"
                                                                        alt=""></div>
                            <div class="circle circle-center"></div>
                            <div class="circle center circle-main"><img src="/img/main/path-arrow-right.svg"
                                                                        alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 text-white">
                    <div class="path-info">
                        <div class="path-info-header">
                            <p class="h6-title">3D тур</p>
                            <div class="path-info-line"></div>
                            <p class="h6-title" style="color: #707A75;">Информация</p>
                        </div>
                        <div class="path-link-map">
                            <div class="terms-map center" style="height: 100%;">
                                <a class="terms-link" href="">
                                    <img src="/img/terms/link.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-news">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <p class="h5-title text-center mb-4">Новости</p>
                <p class="txt-22 ff-bold mb-5">ПОДРОБНЕЕ О МАРШРУТЕ</p>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mb-3 center">
                    <a href="sub-news.html" class="card text-dark" style="height: 100%;">
                        <img src="/img/main/news-img.png" class="card-img-top p-0" alt="...">
                        <div class="card-body">
                            <div class="d-flex">
                                <small class="mr-3">Новости</small>
                                <small><img src="/img//main/news-time-icon.svg" alt=""> 6 мин</small>
                            </div>
                            <h5 class="h5-title ff-bold">Көктем күндерінің бірінде бейнетұзақ назарына үсті дымқыл
                                қоңыр
                                аю ілікті</h5>
                            <p class="card-text">Жаңбырлы көктем күндерінің бірінде біздің бейнетұзақ назарына үсті
                                дымқыл қоңыр аю ілікті</p>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-6 news-group">
                    <a href="sub-news.html" class="card mb-3 text-dark">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <small class="mr-3">Новости</small>
                                <small>6 мин</small>
                            </div>
                            <h5 class="h5-title ff-bold fs-25">КазАту университеты мен "Дендрохронологиялық" бағытта
                                семинар өтті.</h5>
                        </div>
                    </a>

                    <a href="sub-news.html" class="card mb-3 text-dark">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <small class="mr-3">Новости</small>
                                <small>6 мин</small>
                            </div>
                            <h5 class="h5-title ff-bold fs-25">МҰТП аумағында мекендейтін қар ілбісінің видеосы</h5>
                        </div>
                    </a>

                    <a href="sub-news.html" class="card mb-3 text-dark">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <small class="mr-3">Новости</small>
                                <small>6 мин</small>
                            </div>
                            <h5 class="h5-title ff-bold fs-25">Тау бұлағымен көрікті </h5>
                        </div>
                    </a>

                    <a href="sub-news.html" class="card mb-3 text-dark">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <small class="mr-3">Новости</small>
                                <small>6 мин</small>
                            </div>
                            <h5 class="h5-title ff-bold fs-25">КазАту университеты мен "Дендрохронологиялық" бағытта
                                семинар өтті. </h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-recommendation">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <p class="h5-title text-center mb-4">Рекомендуемые страницы</p>
                <div class="d-none d-sm-flex">
                    <div class="circle center green-200-bg mr-2"><img src="/img/main/arrow-left.svg" alt="">
                    </div>
                    <div class="circle center"><img src="/img/main/arrow-right.svg" alt=""></div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 col-sm-6 col-lg-3 my-3">
                    <div class="card border-0" style="height: 100%;">
                        <img src="/img/main/recommendation-img.jpg" class="card-img-top p-0" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="title ff-bold">Конные туры в саты</h5>
                            <p class="txt-18 my-3">казахстан, Акмолинская область, Бурабайский расположение в 3д
                                карте
                                казахстан, Акмолинская область, </p>
                            <div class="d-flex align-items-center">
                                <small class="mr-3 txt-green-100">Средний чек</small>
                                <p class="txt-23-w6 ml-3">18 000 тг</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 my-3 d-none d-md-block">
                    <div class="card border-0" style="height: 100%;">
                        <img src="/img/main/recommendation-img.jpg" class="card-img-top p-0" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="title ff-bold">Конные туры в саты</h5>
                            <p class="txt-18 my-3">казахстан, Акмолинская область, Бурабайский расположение в 3д
                                карте
                                казахстан, Акмолинская область, </p>
                            <div class="d-flex align-items-center">
                                <small class="mr-3 txt-green-100">Средний чек</small>
                                <p class="txt-23-w6 ml-3">18 000 тг</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 my-3 d-none d-md-block">
                    <div class="card border-0" style="height: 100%;">
                        <img src="/img/main/recommendation-img.jpg" class="card-img-top p-0" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="title ff-bold">Конные туры в саты</h5>
                            <p class="txt-18 my-3">казахстан, Акмолинская область, Бурабайский расположение в 3д
                                карте
                                казахстан, Акмолинская область, </p>
                            <div class="d-flex align-items-center">
                                <small class="mr-3 txt-green-100">Средний чек</small>
                                <p class="txt-23-w6 ml-3">18 000 тг</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 my-3 d-none d-sm-block">
                    <div class="card border-0" style="height: 100%;">
                        <img src="/img/main/recommendation-img.jpg" class="card-img-top p-0" alt="...">
                        <div class="card-body p-0 pt-2">
                            <h5 class="title ff-bold">Конные туры в саты</h5>
                            <p class="txt-18 my-3">казахстан, Акмолинская область, Бурабайский расположение в 3д
                                карте
                                казахстан, Акмолинская область, </p>
                            <div class="d-flex align-items-center">
                                <small class="mr-3 txt-green-100">Средний чек</small>
                                <p class="txt-23-w6 ml-3">18 000 тг</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-order">
        <div class="container-fluid">
            <div class="text-center text-white order-text">
                <img src="/img/main/order-img-left.png" alt="" class="order-img-left d-none d-xl-block">
                <img src="/img/main/order-img-right.png" alt="" class="order-img-right d-none d-xl-block">
                <p class="txt-22">На прошлой неделе в парк Кольсай кольдеры приходил 4702 человек(а)</p>
                <p class="my-4 h2-title ff-bold">Сегодня ваша очередь</p>
                <p class="h5-title ff-bold">в парке 105 человек</p>
            </div>
        </div>
    </section>
</main>