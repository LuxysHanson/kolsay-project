<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use frontend\assets\BootstrapAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/app_2.css',
        'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css'
    ];
    public $js = [
        '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js',
        'js/header_2.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
