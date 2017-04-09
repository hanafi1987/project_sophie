<?php

namespace frontend\controllers;

use Yii;
use yii\rest\Controller;
use frontend\models\PromoCode;


class PromocodeController extends Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
        if($request->get()){
            $promoModel = new PromoCode();
            return $promoModel->findPromoCode($request->get('promocode'));
        }

    }


}