<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $type integer */

$this->title = 'Сервис центры и сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-index">




    <ul class="nav nav-pills mb-2">
        <li class="nav-item">
            <a class="nav-link <?=$type == \common\models\Contacts::TYPE_CONSULTANT ? 'active':'';?>" href="/contacts/index?type=1"><?=\common\models\Contacts::getTypeLabel(\common\models\Contacts::TYPE_CONSULTANT);?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$type == \common\models\Contacts::TYPE_SERVICE_CENTER ? 'active':'';?>" href="/contacts/index?type=2"><?=\common\models\Contacts::getTypeLabel(\common\models\Contacts::TYPE_SERVICE_CENTER);?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$type == \common\models\Contacts::TYPE_DEVELOPER ? 'active':'';?>" href="/contacts/index?type=3"><?=\common\models\Contacts::getTypeLabel(\common\models\Contacts::TYPE_DEVELOPER);?></a>
        </li>
    </ul>
    <hr>
    <p>
        <?= Html::a('Добавить', ['create', 'type' => $type], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute' => 'type',
                'value' => function($data){
                    return \common\models\Contacts::getTypeList()[$data->type];
                }
            ],
            'number:ntext',
            'position:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \common\models\Contacts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]);
    ?>


</div>
