<?php


namespace app\controllers;


use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class MapsController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}