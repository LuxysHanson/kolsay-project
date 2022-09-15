<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'assetsAutoCompress' => [
            'class'   => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
            'enabled' => false,

            'readFileTimeout' => 3,           //Time in seconds for reading each asset file

            'jsCompress'                => true,        //Enable minification js in html code
            'jsCompressFlaggedComments' => true,        //Cut comments during processing js

            'cssCompress' => true,        //Enable minification css in html code

            'cssFileCompile'        => true,        //Turning association css files
            'cssFileCompileByGroups' => false ,      //Enables the compilation of files in groups rather than in a single file. Works only when the $cssFileCompile option is enabled
            'cssFileRemouteCompile' => false,       //Trying to get css files to which the specified path as the remote file, skchat him to her.
            'cssFileCompress'       => true,        //Enable compression and processing before being stored in the css file
            'cssFileBottom'         => false,       //Moving down the page css files
            'cssFileBottomLoadOnJs' => false,       //Transfer css file down the page and uploading them using js

            'jsFileCompile'                 => true,        //Turning association js files
            'jsFileCompileByGroups'         => false ,       //Enables the compilation of files in groups rather than in a single file. Works only when the $jsFileCompile option is enabled
            'jsFileRemouteCompile'          => false,       //Trying to get a js files to which the specified path as the remote file, skchat him to her.
            'jsFileCompress'                => true,        //Enable compression and processing js before saving a file
            'jsFileCompressFlaggedComments' => true,        //Cut comments during processing js

            'noIncludeJsFilesOnPjax' => true,        //Do not connect the js files when all pjax requests when all pjax requests when enabled jsFileCompile
            'noIncludeCssFilesOnPjax' => true,        //Do not connect the css files when all pjax requests when all pjax requests when enabled cssFileCompile

            'htmlFormatter' => [
                //Enable compression html
                'class'         => 'skeeks\yii2\assetsAuto\formatters\html\TylerHtmlCompressor',
                'extra'         => false,       //use more compact algorithm
                'noComments'    => true,        //cut all the html comments
                'maxNumberRows' => 50000,       //The maximum number of rows that the formatter runs on
            ],
        ],
        'cache'        => [
            'class'     => 'yii\caching\FileCache',
            'cachePath' => '@frontend/runtime/cache',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'xx-XX', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'cachingDuration' => 86400,
                    'enableCaching' => true,
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,   // do not publish the bundle
                    'js' => [
                        'https://code.jquery.com/jquery-3.4.1.min.js',
                    ]
                ],
            ],
        ],
        'mailer' => [
            'useFileTransport' => false,
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mail.ru', //вставляем имя или адрес почтового сервера
                'username' => 'support@leonis.kz',
                'password' => 'HihKh&P3ieJ1',
                'port' => '465',
                'encryption' => 'ssl',
                'streamOptions' =>[
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'suffix' => '/',
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
                'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_PERMANENT, // используем временный редирект вместо постоянного
            ],
            'rules' => [
                '/<category:(banknote-counters|banknote-sorters|coin-counters|coin-sorters|vacuum-packers|currency-detectors|electronic-cashiers|automated-deposit-machines|virtual-banking-machines|health)>/<name:[a-zA-Z0-9\-\_]{1,}>/' => 'catalog/view',
                '/<category:(banknote-counters|banknote-sorters|coin-counters|coin-sorters|vacuum-packers|currency-detectors|electronic-cashiers|automated-deposit-machines|virtual-banking-machines|health)>' => 'catalog/index',
                '/service' => 'site/service',
                '/contacts' => 'site/contacts',
                '/certificates' => 'site/certificates',
                '/sitemap' => 'site/sitemap',
                [
                    'pattern' => '/sitemap.xml',
                    'route' => 'site/sitemap-xml',
                    'suffix' => false,
                ],
            ],
        ],

    ],
    'on beforeAction' => function ($event) {
        if(Yii::$app->request->pathInfo === 'index.php') {
            Yii::$app->response->redirect('/');
            $event->handled = true;
        }
    },
    'modules' => [

    ],

    'params' => $params,
];
