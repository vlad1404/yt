<?php
namespace app\controllers;

use yii\filters\AccessControl;

class BaseController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->getIsGuest()) {
            $this->redirect('/site/index');
            return false;
        }
        return parent::beforeAction($action);
    }
}