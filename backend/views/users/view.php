<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Пользователи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">


    <p>
        <?if(\common\models\User::isAccess(\common\models\User::ROLE_ADMIN)):?>
            <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>

        <?endif;?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'formatter' => [

            'class' => '\yii\i18n\Formatter',

            'dateFormat' => 'dd.MM.yyyy',

            'datetimeFormat' => 'dd.MM.yyyy HH:mm',

        ],
        'attributes' => [
            'id',
            'username',
            'email:email',
            'created_at:datetime',
            [
                'attribute' => 'system_role',
                'value' => function($data){
                    return $data->getRoleName();
                }
            ],
            'first_name',
            'last_name',
            'middle_name',
        ],
    ]) ?>

</div>
