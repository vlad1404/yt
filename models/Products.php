<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $price
 *
 * @property ProductCategory[] $productCategories
 * @property ProductsRegions[] $productsRegions
 * @property ProductsTags[] $productsTags
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[ProductCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['prod_id' => 'id']);
    }

    /**
     * Gets query for [[ProductsRegions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsRegions()
    {
        return $this->hasMany(ProductsRegions::className(), ['prod_id' => 'id']);
    }

    /**
     * Gets query for [[ProductsTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsTags()
    {
        return $this->hasMany(ProductsTags::className(), ['prod_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['id' => 'cat_id'])
            ->via('productCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegions()
    {
        return $this->hasMany(Regions::className(), ['id' => 'region_id'])
            ->via('productsRegions');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tags::className(), ['id' => 'tag_id'])
            ->via('productsTags');
    }
}
