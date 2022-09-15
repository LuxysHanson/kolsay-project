<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Партнеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => [

            'class' => '\yii\i18n\Formatter',

            'dateFormat' => 'dd.MM.yyyy',

            'datetimeFormat' => 'dd.MM.yyyy HH:mm::ss',

        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return \common\models\Partners::getStatusList()[$data->status];
                }
            ],
            //'image',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \common\models\Partners $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
