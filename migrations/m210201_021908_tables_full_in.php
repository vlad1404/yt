<?php

use yii\db\Migration;

/**
 * Class m210201_021908_tables_full_in
 */
class m210201_021908_tables_full_in extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for ($i = 1; $i <= 20; $i++){
           $tag = new \app\models\Tags();
           $tag->name = 'tag_'.$i;
           $tag->save();
        }
        for ($i = 1; $i <= 1000; $i++){
           $product = new \app\models\Products();
           $product->name = 'prod_'.$i;
           $product->price = rand(1,1000);
           $product->save();
        }
        for ($i = 1; $i <= 10; $i++){
           $category = new \app\models\Categories();
           $category->name = 'cat_'.$i;
           $category->save();
        }
        for ($i = 1; $i <= 25; $i++){
           $region = new \app\models\Regions();
           $region->name = 'region_'.$i;
           $region->save();
        }

        $categories = \app\models\Categories::find()->all();
        $regions = \app\models\Regions::find()->all();
        $tags = \app\models\Tags::find()->all();
        $products = \app\models\Products::find()->all();

        foreach ($categories as $category) {
            $category->link('parent', current($categories));
        }

        foreach ($products as $product) {
            $product->link('categories', $categories[array_rand($categories)]);
            $product->link('regions', $regions[array_rand($regions)]);
            $product->link('tags', $tags[array_rand($tags)]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        \app\models\Categories::deleteAll();
        \app\models\Products::deleteAll();
        \app\models\Regions::deleteAll();
        \app\models\Tags::deleteAll();
    }
}
