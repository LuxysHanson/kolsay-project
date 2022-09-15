<?php

namespace backend\controllers;
use common\models\Items;
use yii\data\ActiveDataProvider;
use backend\components\BaseAdminController as Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\UploadedFile;

class ItemsController extends Controller
{
    public function behaviors() {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                        'upload-file' => ['POST'],
                    ],
                ],
            ]
        );
    }
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Items::find(),
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
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate() {
        $model = new Items();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
//            var_dump($model);die();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUploadFile(){
        $file = UploadedFile::getInstanceByName("file");
        $link = '';
        if ($file){
            $rand = uniqid(rand(), true);
            $dir = Yii::getAlias('@frontend/web/docs/items/');
            $dir2 = Yii::getAlias('docs/items/');
            $fileName = $rand . '.' . $file->extension;
            $file->saveAs($dir . $fileName);
            $file = $fileName; // без этого ошибка
            $link = '/'.$dir2 . $fileName;
        }
        return json_encode(['link' => $link]);
    }

    protected function findModel($id) {
        if (($model = Items::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
