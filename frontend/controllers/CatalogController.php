<?php

namespace frontend\controllers;
use common\models\Category;
use common\models\Items;
use frontend\components\BaseController as Controller;
use frontend\models\SchemaHelper;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class CatalogController extends Controller
{
    /**
     * @param null $category
     * @param null $name
     */
    public function actionIndex($category = null,  $name = null)
    {
        if ($category) {
            $currCategory = Category::find()->where(['alias' => $category])->one();
            $query = Items::find()->where(['status' => Items::STATUS_PUBLISH, 'category_id' => $currCategory->id]);
        }else{
            $currCategory = null;
            $query = Items::find()->where(['status' => Items::STATUS_PUBLISH]);
        }
        $categoryList = Category::find()->all();

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 12;
        $itemList = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        /*SEO*/
        $this->generateMetaTags($currCategory, null);


        return $this->render('index', [
            'itemList' => $itemList,
            'categoryList' => $categoryList,
            'pages' => $pages,
            'curr_category' => $category,
            'currCategory' => $currCategory,
        ]);
    }

    /**
     * @param null $category
     * @param null $name
     * @return string|\yii\web\Response
     */
    public function actionView($category, $name = null)
    {
        $model = Items::find()->where('BINARY [[alias]]=:alias', ['alias'=>$name])->one();
        if (!$model){
            $model = Items::find()->where(['alias'=>strtolower($name)])->one();
            if ($model){
                return $this->redirect('/'.$model->category->alias.'/'.$model->alias.'/',301);
            }else{
                return $this->redirect('/'.$category.'/',301);
            }
        }
        $countQuery = Items::find()->where(['status' => Items::STATUS_PUBLISH, 'category_id' => $model->category_id])->andWhere(['<>','id', $model->id])->count();
        if ($countQuery >= 4){
            $popularItems = Items::find()->where(['status' => Items::STATUS_PUBLISH])->andWhere(['category_id'=>$model->category_id])->andWhere(['<>','id', $model->id])->limit(4)->all();
        }else{
            $popularItems = ArrayHelper::merge(
                Items::find()->where(['status' => Items::STATUS_PUBLISH, 'category_id'=>$model->category_id])->andWhere(['<>','id', $model->id])->all(),
                Items::find()->where(['status' => Items::STATUS_PUBLISH])->andWhere(['<>','category_id', $model->category_id])->limit(4-$countQuery)->all()
            );
        }
        $this->generateMetaTags($model->category, $model);
        return $this->render('view', [
            'model' => $model,
            'popularItems' => $popularItems
        ]);
    }

    /**
     * @param Category|null $category
     * @param Items|null $model
     * @return void
     */
    private function generateMetaTags(?Category $category, ?Items $model){
        $schema = new SchemaHelper();
        if ($category){
            if ($model){
                if($model->title_meta){
                    $this->initMetaTags(
                        $model->title_meta,
                        $model->title,
                        $model->ceo_desc
                    );
                }else{
                    $title = "Купить $model->title на Bass Technology";
                    $keyword = "$category->title $model->title";
                    $description = "$model->title на официальном сайте☝ Высокая производительность ✔️ Удобство и простота в обслуживании ✔️ Гарантия качества";
                    $this->initMetaTags(
                        $title,
                        $keyword,
                        $description

                    );
                }

                $schema->addSchema('catalog', 'view', $category, $model);
            }else{
                $this->initMetaTags(
                    $category->title_meta,
                    $category->title,
                    $category->description
                );
                $schema->addSchema('site', 'index');
            }
        }else{
            $this->initMetaTags(
                'Каталог товаров —  Bass Technology',
                'Счетчики Банкнот,Сортировщики Банкнот,Счетчики Монет,Сортировщики Монет,Вакуумные Упаковщики,Детекторы Валют,Электронные Кассиры,Автоматизированные Депозитные Машины,Виртуальные Банковские Машины',
                'Оборудования для банков от Bass Technology ⏩ Консультации и заказ по телефонам ☎️ +7 727 225 48 74 ☎️ +7 777 705 87 96'
            );
            $schema->addSchema('site', 'index');
        }
    }

}
