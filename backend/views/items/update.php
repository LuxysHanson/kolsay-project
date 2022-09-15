<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Items */

$this->title = Yii::t('app', 'Редактировать товар: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Товары'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Редактировать');
?>
<div class="news-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
