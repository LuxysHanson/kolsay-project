<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Breadcrumbs;
use simialbi\yii2\schemaorg\helpers\JsonLDHelper;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="canonical" href="https://bass-technology.kz<?=Yii::$app->request->url;?>">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php JsonLDHelper::render(); ?>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <?php echo $this->render('header'); ?>
    <?= Alert::widget() ?>
    <div class="main-container">
        <?=Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>

    </div>
    <?= $content ?>

    <?php echo $this->render('footer'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
