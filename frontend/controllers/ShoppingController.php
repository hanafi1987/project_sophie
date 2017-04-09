<?php

namespace frontend\controllers;

use Yii;
use yii\rest\Controller;
use frontend\models\ShipConfig;
use frontend\models\Shoppingcart;


class ShoppingController extends Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
        if ($request->get('param') == 'qtty') {
            $scartModel = new Shoppingcart();
            return $scartModel->getNumCart($request->get('secret'));
        } else if ($request->get('param') == 'carts') {
            $scartModel = new Shoppingcart();
            return $scartModel->getShoppingCart($request->get('secret'));
        } else if ($request->get('param') == 'countries') {
            $shipConfModel = new ShipConfig();
            return $shipConfModel->getShipConf();
        }

    }

    public function actionCreate()
    {
        $request = Yii::$app->request;
        if ($request->post()) {
            $scartModel = new Shoppingcart();
            $scart = $scartModel->addCart($request->post('product_id'), $request->post('secret'), $request->getUserIP());
            return $scart;
        }

    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        if ($request->get()) {
            $scartModel = new Shoppingcart();
            $scart = $scartModel->removeItemFromCart($request->get('id'), $request->get('secret'));
            return $scart;
        }
    }

}