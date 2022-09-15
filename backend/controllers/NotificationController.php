<?php

namespace backend\controllers;

use common\models\News;
use common\models\Notification;
use yii\data\ActiveDataProvider;

class NotificationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Notification::find(),
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],

        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = Notification::findOne($id);
        return $this->render('view', [
            'model' => $model
        ]);
    }

}
