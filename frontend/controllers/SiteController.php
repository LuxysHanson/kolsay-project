<?php

namespace frontend\controllers;


use common\models\Category;
use common\models\Contacts;
use common\models\Items;
use common\models\Partners;
use common\models\Products;
use frontend\models\SchemaHelper;
use frontend\models\Sitemap;
use simialbi\yii2\schemaorg\helpers\JsonLDHelper;
use Yii;
use frontend\components\BaseController as Controller;
use frontend\models\ContactForm;
use yii\db\Expression;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'contact' => ['post'],
                ],
            ],

        ];
    }

    public function beforeAction($action)
    {
        if ($action->id == 'index'){
            $this->title = 'Көлсай көлдері';
            $this->keywords = 'Көлсай көлдері';
            $this->description = 'Көлсай көлдері ⏩ Отдых ✔ ☝ Перейти';
        }else if($action->id == 'service'){
            $this->title = 'Сервисное обслуживания системы электронной очереди «NOMAD»';
            $this->keywords = 'Система электронной очереди, Nomad System';
            $this->description = 'Сервисное обслуживания программно-аппаратного комплекса системы электронной очереди «NOMAD» от Bass Technology ⏩ Консультация ⭐ Техническое сопровождение ☝ Перейти';
        }else if($action->id == 'contacts'){
            $this->title = 'Контакты —  Bass Technology';
            $this->keywords = 'Система электронной очереди';
            $this->description = 'Контактная информация Bass Technology ⏩ Консультации и заказ по телефонам ☎️ +7 727 225 48 74 ☎️ +7 777 705 87 96';
        }else if($action->id == 'certificates') {
            $this->title = 'Сертификаты —  Bass Technology';
            $this->keywords = 'Система электронной очереди';
            $this->description = 'Различные сертификаты соответствия и награды как лучшая сервисная компания ⏩ Программный продукт имеет авторские права и зарегистрирован ☝ Перейти';
        }else if($action->id == 'sitemap'){
            $this->title = 'Карта сайта —  Bass Technology';
            $this->keywords = 'Система электронной очереди';
            $this->description = 'Карта сайта Bass Technology ⏩ Консультации и заказ по телефонам ☎️ +7 727 225 48 74 ☎️ +7 777 705 87 96';
        }else{
            $this->title = 'Купить систему электронной очереди NOMAD от Bass Technology';
            $this->keywords = 'Система электронной очереди';
            $this->description = 'Электронная система управления очередью по индивидуальному проекту NOMAD SYSTEM ⏩ Свой сервис ✔️ Интеграция с CRM системами ⚡ Широкий спектр решений ☝ Перейти';
        }
        $schema = new SchemaHelper();
        $schema->addSchema('site', $action->id);

        $this->registerMetaTags();
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $partners = Partners::find()->where(['status' => Partners::STATUS_PUBLISH])->all();
        $products = Products::find()->where(['status' => Products::STATUS_PUBLISH])->all();
        $items = Items::find()->where(['status' => Items::STATUS_PUBLISH])->andWhere(['category_id' => [1,2,3]])->orderBy(new Expression('rand()'))->limit(4)->all();
        return $this->render('index', [
            'partners' => $partners,
            'products' => $products,
            'items' => $items,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            $model->sendTelegramNotification();

            return $this->redirect('/');
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionService(){
        $contactLists = Contacts::find()->where(['type' => Contacts::TYPE_CONSULTANT])->all();
        $cityLists = Contacts::find()->where(['type' => Contacts::TYPE_SERVICE_CENTER])->all();
        $specLists = Contacts::find()->where(['type' => Contacts::TYPE_DEVELOPER])->all();
        return $this->render('service', [
            'contactLists' => $contactLists,
            'cityLists' => $cityLists,
            'specLists' => $specLists,
        ]);

    }


    public function actionContacts(){
        $cityLists = Contacts::find()->where(['type' => Contacts::TYPE_SERVICE_CENTER])->all();

        return $this->render('contacts',
            [
                'cityLists' => $cityLists,
            ]);
    }

    public function actionCertificates(){

        return $this->render('certificates');
    }

    public function actionSitemap(){

        $categoryList = Category::getCategories();
        return $this->render('sitemap', [
            'categoryList' => $categoryList,
        ]);
    }

    public function actionAbout(){
        return $this->render('about',[

        ]);

    }

    public function actionWork(){
        return $this->render('work',[

        ]);
    }
    public function actionFoto(){
        return $this->render('foto',[

        ]);
    }
    public function actionPhoto(){
        return $this->render('foto_view',[

        ]);
    }

    public function actionTourism(){
        return $this->render('tour',[

        ]);
    }

    public function actionFlora(){
        return $this->render('flora',[

        ]);
    }




    public function actionSitemapXml()
    {
        $sitemap = new Sitemap();
        //Если в кэше нет карты сайта
        Yii::$app->cache->delete('sitemap');
//        if (!$xml_sitemap = Yii::$app->cache->get('sitemap')) {
            $urls = $sitemap->getUrl();
            //Формируем XML файл
            $xml_sitemap = $sitemap->getXml($urls);
            // кэшируем результат
            Yii::$app->cache->set('sitemap', $xml_sitemap, 3600*12);
//        }
        //Выводим карту сайта
        $sitemap->showXml($xml_sitemap);
    }
}
