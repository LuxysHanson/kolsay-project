<?php

namespace frontend\models;
use common\models\Category;
use common\models\Items;
use simialbi\yii2\schemaorg\models\Brand;
use simialbi\yii2\schemaorg\models\ContactPoint;
use simialbi\yii2\schemaorg\models\Offer;
use simialbi\yii2\schemaorg\models\Organization;
use simialbi\yii2\schemaorg\models\Person;
use simialbi\yii2\schemaorg\models\PostalAddress;
use simialbi\yii2\schemaorg\models\Product;
use yii\base\Model;
use simialbi\yii2\schemaorg\helpers\JsonLDHelper;

/**
 *
 * @property string $controller
 * @property string $action
 * @property Category|null $category
 * @property Items|null $item
 */
class SchemaHelper extends Model
{
    public $controller;
    public $action;
    public $category;
    public $item;
    /**
     * @param $controller
     * @param $action
     * @param Category|null $category
     * @param Items|null $item
     */
    public function addSchema($controller, $action, Category $category = null, Items $item = null){
        $this->controller = $controller;
        $this->action = $action;
        $this->category = $category;
        $this->item = $item;
        $objects = $this->generateSchema();
        foreach ($objects as $object){
            JsonLDHelper::add($object);
        }


    }

    protected function generateSchema(){
        $objects = [];

        $organization = new Organization();
        $organization->legalName = 'Bass Technology';
        $organization->brand = 'Nomad System';
        $organization->url = \Yii::$app->urlManager->hostInfo;
        //Address
        $address = new PostalAddress();
        $address->streetAddress = 'проспект Суюнбая 493Б';
        $address->addressLocality = 'г. Алматы';
        $address->addressCountry = 'Республика Казахстан';
        $address->addressRegion = 'KZ';
        $address->postalCode = '050030/A35C0X2';
        $organization->address = $address;
        //contacts
        $contact1 = new ContactPoint();
        $contact1->telephone = '+7 727 225 48 74';
        $contact1->contactType = 'customer service';
        $contact2 = new ContactPoint();
        $contact2->telephone = '+7 777 705 87 96';
        $contact2->contactType = 'customer service';

        $organization->contactPoint = [$contact1, $contact2];
        $organization->sameAs = ['https://www.instagram.com/bass_technology.kz', 'https://www.facebook.com/EQNomadKZ', 'https://www.youtube.com/channel/UCYuvbVgCZIzzProRPr5ieTQ'];
        $organization->description = 'Электронная система управления очередью по индивидуальному проекту NOMAD SYSTEM ⏩ Свой сервис ✔️ Интеграция с CRM системами ⚡ Широкий спектр решений ⏩ Консультации и заказ по телефонам ☎️ +7 727 225 48 74 ☎️ +7 777 705 87 96';

        $objects[] = $organization;
        if($this->controller == 'catalog' && $this->action == 'view' && $this->category && $this->item){
            $product = new Product();
            $product->name = $this->category->title.' '.$this->item->title;

            $image = [];
            $attachments = $this->item->getFiles();
            if ($attachments && is_array($attachments)){
                foreach ($attachments as $attachment){
                    $image[] = \Yii::$app->request->hostInfo.$attachment;
                }
            }
            $product->image = $image;
            $product->description = $this->item->description;

            $brand = new Brand();
            $brand->name = $this->item->title;
            $product->brand = $brand;

            $offer = new Offer();
            $offer->url = \Yii::$app->urlManager->hostInfo.'/'.$this->category->alias.'/'.$this->item->alias;
            $offer->itemCondition = 'https://schema.org/UsedCondition';
            $offer->availability = 'https://schema.org/InStock';
            $offer->seller = $organization;
            $product->offers = $offer;
            $objects[] = $product;
        }

        return $objects;
    }

}