<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'node_modules/flag-icon-css/css/flag-icon.min.css',
        'node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css',
        'node_modules/font-awesome/css/font-awesome.min.css',
    ];

    public $js = [
        'js/main.js',
        'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.2/MathJax.js?config=TeX-MML-AM_CHTML',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js',
        'js/temp/off-canvas.js',
        'js/temp/hoverable-collapse.js',
        'js/temp/misc.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}