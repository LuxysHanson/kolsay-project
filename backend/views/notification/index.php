<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Уведомления');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => [

            'class' => '\yii\i18n\Formatter',

            'dateFormat' => 'dd.MM.yyyy',

            'datetimeFormat' => 'dd.MM.yyyy г. HH:mm',

        ],
        'columns' => [
            'id',
            [
                'attribute' => 'type',
                'value' => function($data){
                    return Html::a($data->getTypeLabel().' '.$data->last_name.' '.$data->name ,['notification/view', 'id' => $data->id]);
                },
                'format' => 'raw'

            ],

            'message:html',
            'created_at:datetime',
        ],
    ]); ?>


</div>
