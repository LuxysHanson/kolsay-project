<?php
/* @var $this yii\web\View */
/* @var $cityLists common\models\Contacts[] */
try {
    $this->registerJsFile('https://maps.api.2gis.ru/2.0/loader.js?pkg=full');
} catch (\yii\base\InvalidConfigException $e) {
}
$js = <<<JS
    var map;
    let x_init = parseFloat($('#map-info .active').data('x'));
    let y_init = parseFloat($('#map-info .active').data('y'));
    if (x_init && y_init){
        console.log([y_init, x_init])
        generateMap([y_init, x_init])
    }
    
    $('.map-button').click(function (e){
        e.preventDefault();
        $('.map-button').removeClass('active');
        $(this).addClass('active');
        let x = parseFloat($(this).data('x'));
        let y = parseFloat($(this).data('y'));
        if (map){
            map.remove();
        }
        
        generateMap([y, x])
    });
    
    function generateMap(marker){
        DG.then(function () {
            map = DG.map('map', {
                center: marker,
                zoom: 17
            });
            myIcon = DG.icon({
                iconUrl: 'https://bass-technology.kz/img/map-bass-icon.png',
                iconSize: [107, 107]
            });
            DG.marker(marker,{ icon: myIcon}).addTo(map);
        });
    }
    
JS;
$this->registerJs($js);
?>
<style>
    #map{
        height: 520px;
    }
    @media screen and (max-width: 576px)  {
        #map{
            height: 370px;
        }
    }
</style>
<div class="main-container">
    <div class="row" id="map-block">

        <div class="col-12" id="map"></div>
        <div id="map-info">
            <div class="row">
                <span class="col-12 map-title mb-3">Выберите город</span>
                <?foreach ($cityLists as $key => $city):?>
                    <a href="#" class="map-button col-12 d-flex <?=$key==0 ?'active':'';?>" data-x="<?=$city->map_x;?>" data-y="<?=$city->map_y;?>" rel="nofollow">
                        <div class=" city-img" style="background-image: url('/img/city/almaty.jpg')"></div>
                        <div class="city-text flex-column">
                            <span class="d-flex name"><?=$city->title;?></span>
                            <div class="description flex-column">
                                <span class="d-flex"><?=$city->position;?></span>
                                <span class="d-flex"><?=$city->number;?></span>
                            </div>
                        </div>
                    </a>
                <?endforeach;?>
            </div>


        </div>
    </div>
</div>

