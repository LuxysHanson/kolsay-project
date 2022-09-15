<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Items;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Товары');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">
    <p>
        <?= Html::a(Yii::t('app', 'Создать'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'alias',
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->title;
                }
            ],
            'created_at:datetime',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return Items::getStatusList()[$data->status];
                }
            ],
            //'image',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Items $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
