<?php

namespace frontend\controllers;

use Yii;
use yii\rest\Controller;
use frontend\models\Order;

class CheckoutController extends Controller
{
    public $layout = "main";

    public function actionCreate()
    {
        $request = Yii::$app->getRequest();
        if ($request->post()) {
            $orderModel = new Order();
            return $orderModel->createOrder(
                $request->post('carts'),
                $request->post('total'),
                $request->post('ordertotal'),
                $request->post('shipfee'),
                $request->post('discounts'),
                $request->post('promotioncode'),
                $request->post('secretkey'),
                $request->post('country')
            );
        }

    }

    public function actionView()
    {
        $request = Yii::$app->getRequest();
        if ($request->get()) {
            $orderModel = new Order();
            return $orderModel->getOrder($request->get('id'), $request->get('secret_key'));
        }

    }

}