<?php
namespace frontend\components;
use yii\web\Controller;
use Yii;

class BaseController extends Controller
{

    public $description = '';
    public $keywords = '';
    public $title = '';

    public function registerMetaTags(){
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $this->description,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $this->keywords,
        ]);
        Yii::$app->view->title = $this->title;
    }

    public function initMetaTags($title, $keywords, $description){
        $this->description = $description;
        $this->keywords = $keywords;
        $this->title = $title;
        $this->registerMetaTags();
    }



}