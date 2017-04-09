<?php

namespace frontend\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\Response;

class OrderController extends Controller
{
    public $layout = "main";

    public function actionIndex()
    {
        $request = Yii::$app->getRequest();
        return $this->render('index', array('order_id' => $request->get('id')));

    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_HTML;
        return $behaviors;
    }
}