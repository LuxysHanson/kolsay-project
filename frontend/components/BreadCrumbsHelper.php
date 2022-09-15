<?php

namespace frontend\components;

use simialbi\yii2\schemaorg\helpers\JsonLDHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use Yii;

class BreadCrumbsHelper extends JsonLDHelper
{
    /**
     * Adds BreadcrumbList schema.org markup based on the application view `breadcrumbs` parameter
     * @throws \yii\base\InvalidConfigException
     */
    public static function addBreadCrumbList()
    {
        if (!class_exists('\simialbi\yii2\schemaorg\models\BreadcrumbList')) {
            return;
        }

        $view = Yii::$app->view;

        /* @var $breadcrumbList \simialbi\yii2\schemaorg\models\Model */
        $breadcrumbs = ArrayHelper::merge([['label' => 'Главная', 'url' => ['/']]], ArrayHelper::getValue( $view->params, 'breadcrumbs', []));
        $breadcrumbList = Yii::createObject([
            'class' => 'simialbi\yii2\schemaorg\models\BreadcrumbList'
        ]);
        if (!empty($breadcrumbs)) {
            $position = 1;
            foreach ($breadcrumbs as $breadcrumb) {
                $listItem = Yii::createObject([
                    'class' => 'simialbi\yii2\schemaorg\models\ListItem',
                    'position' => $position++
                ]);
                if (is_array($breadcrumb)) {
                    $listItem->item = [
                        '@id' => Url::to(ArrayHelper::getValue($breadcrumb, 'url', ''), true),
                        'name' => ArrayHelper::getValue($breadcrumb, 'label', '')
                    ];
                } else {
                    $listItem->item = [
                        '@id' => Yii::$app->request->absoluteUrl,
                        'name' => $breadcrumb
                    ];
                }
                $breadcrumbList->itemListElement[] = $listItem;
            }
        }

        self::add($breadcrumbList);
    }

}