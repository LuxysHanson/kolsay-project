<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Items */

$this->title = Yii::t('app', 'Создать товар');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Товары'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
