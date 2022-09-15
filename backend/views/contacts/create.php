<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Contacts */

$this->title = 'Добавление '.($model->type == \common\models\Contacts::TYPE_SERVICE_CENTER ? 'сервис центра' : 'сотрудника');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Сотрудники'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
