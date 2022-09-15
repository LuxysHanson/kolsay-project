<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Notification */

$this->title = 'Заявка от '.$model->last_name.' '.$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Уведомления'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">

    <?= DetailView::widget([
        'model' => $model,
        'formatter' => [

            'class' => '\yii\i18n\Formatter',

            'dateFormat' => 'dd.MM.yyyy',

            'datetimeFormat' => 'dd.MM.yyyy HH:mm',

        ],
        'attributes' => [
            'id',
            'org_name',
            'name',
            'last_name',
            'phone',
            'email',
            'created_at:datetime'
        ],
    ]) ?>

</div>
