<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Products;
use Yii;
use yii\filters\AccessControl;
use yii\web\HttpException;

class ProductsController extends BaseController
{
    public function actionIndex()
    {
        $products = Yii::$app->cache->get('products');
        if(!$products){
            $products = Products::find()->all();
            Yii::$app->cache->set('products', $products, 60);
        }
        return $this->render('index', [
            'products' => $products
        ]);
    }

    public function actionView($id)
    {
        $product = Products::find()->where(['id' => $id])->with('regions', 'tags', 'categories')->one();

        if ($product === null)
            throw new HttpException(404);

        return $this->render('view', [
            'product' => $product,
            'tags' => $product->tags,
            'regions' => $product->regions,
            'categories' => $product->categories
        ]);
    }
}
