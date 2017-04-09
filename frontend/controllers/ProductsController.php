<?php

namespace frontend\controllers;

use Yii;
use yii\rest\Controller;
use frontend\models\Products;

class ProductsController extends Controller
{
    public function actionIndex(){
        $request = Yii::$app->getRequest();
        if(!$request->getQueryParam('sorted_value')){
            $productModel = new Products();
            $products = $productModel->listProducts();
            return $products;
        }else{
            $productModel = new Products();
            $products = $productModel->listProductSort($request->getQueryParam('sorted_value'));
            return $products;
        }


    }
}