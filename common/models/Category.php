<?php

namespace common\models;

use Yii;
use common\components\ActiveRecord;
use common\traits\AttributesToInfoTrait;
/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $alias
 * @property string|null $title_meta
 * @property string|null $description
 * @property int|null $is_deleted
 * @property string|null $info
 * @property string|null $seo_text
 * @property Items $items
 */
class Category extends ActiveRecord
{
    use AttributesToInfoTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    public function attributesToInfo()
    {
        return [
            'title_meta',
            'description',
            'keywords',
            'seo_text',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_deleted'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['title_meta', 'description', 'keywords', 'seo_text'], 'safe']

        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Заголовок'),
            'alias' => Yii::t('app', 'ссылка'),
            'title_meta' => Yii::t('app', 'Заголовок Meta'),
            'description' => Yii::t('app', 'Описание'),
            'keywords' => Yii::t('app', 'Ключевые слова'),
            'is_deleted' => Yii::t('app', 'Удален'),
            'info' => Yii::t('app', 'Info'),
        ];
    }

    /**
     * @return array|Category[]|\yii\db\ActiveRecord[]
     */
    public static function getCategories() {
        return self::find()->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems(){
        return $this->hasMany(Items::className(), ['category_id' => 'id']);
    }
}
