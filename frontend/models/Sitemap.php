<?php
namespace frontend\models;

use common\models\Items;
use Yii;
use yii\base\Model;
use common\models\Category;
use yii\helpers\ArrayHelper;

/**
 *
 * @property-read array $url
 */
class Sitemap extends Model{

    public function getUrl(){

        $urls = array();



        //Статичные страницы (у каждой свое действие контроллера)
        $arr_stat_page = [
            'service', 'certificates', 'contacts','sitemap',
        ];
        foreach ($arr_stat_page as $url_stat){
            $urls[] = array(Yii::$app->urlManager->createUrl($url_stat),'weekly');
        }
        $arr_catalog_page = ArrayHelper::merge([
          'catalog'
        ],ArrayHelper::getColumn(Category::find()->all(),'alias'));

        foreach ($arr_catalog_page as $url_category){
            $urls[] = array(Yii::$app->urlManager->createUrl($url_category), 'weekly');
        }

        $arr_items_page = Items::find()->where(['status' => Items::STATUS_PUBLISH])->all();
        $host = Yii::$app->request->hostInfo;
        foreach ($arr_items_page as $item){
            $category = Category::findOne($item->category_id);
            if ($category){
                $urls[] = array('/'.$category->alias. ($item->alias && strlen($item->alias) > 0 ? '/'.$item->alias.'/':''), 'weekly');

            }

        }


        return $urls;
    }

    //Формирует XML файл, возвращает в виде переменной
    public function getXml($urls){
        $host = Yii::$app->request->hostInfo; // домен сайта

        ob_start();

        echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

            <url>
                <loc><?= $host ?></loc>
                <lastmod>2022-05-22</lastmod>
            </url>
            <?php foreach($urls as $url): ?>
                <url>
                    <loc><?= $host.$url[0]?></loc>
                    <lastmod>2022-05-22</lastmod>
                </url>
            <?php endforeach; ?>
        </urlset>

        <?php return ob_get_clean();
    }

    //Возвращает XML файл
    public function showXml($xml_sitemap){
        // устанавливаем формат отдачи контента
        Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        //повторно т.к. может не сработать
        header("Content-type: text/xml");
        echo $xml_sitemap;die;
    }
}