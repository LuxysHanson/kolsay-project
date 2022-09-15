<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Items */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Товары'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">

    <p>
        <?= Html::a(Yii::t('app', 'Назад'), ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы действительно хотите удалить?'),
                'method' => 'post',
            ],
        ]) ?>
        <a class="btn btn-success" target="_blank" href="<?= Yii::$app->params['url'] .'/'. $model->category->alias .'/'. $model->alias?>">Предпросмотр</a>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'formatter' => [

            'class' => '\yii\i18n\Formatter',

            'dateFormat' => 'dd.MM.yyyy',

            'datetimeFormat' => 'dd.MM.yyyy HH:mm::ss',

        ],
        'attributes' => [
            'id',
            'title',
            'description:html',
            'characters:html',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return \common\models\Items::getStatusList()[$data->status];
                }
            ],
            [
                'attribute' => 'attachments',
                'value' => function($data){
                    if ($data->attachments){
                        return '<img src="'.\backend\models\BackendHelper::getUrl().$data->attachments.'" alt="" style="max-width:100px;">';
                    }else{
                        return '';
                    }
                },
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
