<?php

namespace frontend\controllers;

use common\models\News;
use frontend\components\BaseController;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $news = News::find()->where(['status' => News::STATUS_PUBLISH])->orderBy(['created_at'=> SORT_DESC ])->all();
        return $this->render('index', [
            'news' => $news,
        ]);
    }

    public function actionPress(){
        return $this->render('press');
    }

    public function actionView($id)
    {
        $models = News::findOne($id);
        return $this->render('view', [
            'model' => $models,
        ]);
    }
}
