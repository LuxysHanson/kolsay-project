<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Наши интеграции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
