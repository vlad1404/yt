<?php

namespace app\controllers;

use app\models\Categories;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\HttpException;

class CategoriesController extends BaseController
{
    public function actionIndex()
    {
        $categories = Yii::$app->cache->get('products');
        if(!$categories){
            $categories = Categories::find()->all();
            Yii::$app->cache->set('products', $categories, 60);
        }
        return $this->render('index', [
            'categories' => $categories
        ]);
    }

    public function actionView($id)
    {
        $category = Categories::find()->where(['id' => $id])->with('products')->one();

        if ($category === null)
            throw new HttpException(404);

        return $this->render('view', [
            'category' => $category,
            'products' => $category->products
        ]);
    }

}
