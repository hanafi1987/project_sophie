<?php

namespace frontend\controllers;

use yii\rest\Controller;
use yii\web\Response;

class CartsController extends Controller
{
    public $layout = "main";

    public function actionIndex()
    {
        return $this->render('index');

    }
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_HTML;
        return $behaviors;
    }

}