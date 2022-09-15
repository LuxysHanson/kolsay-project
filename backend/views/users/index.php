<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Пользователи');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a(Yii::t('app', 'Создать пользователя'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            [
                'attribute' =>'email',
                'value' => function($data){
                    return Html::a($data->email, ['users/view', 'id' => $data->id]);
                },
                'format' => 'raw',
            ],
            'first_name',
            'last_name',
            [
                'attribute' => 'system_role',
                'value' => function($data){
                    return $data->getRoleName();
                }
            ],

        ],
    ]); ?>


</div>
