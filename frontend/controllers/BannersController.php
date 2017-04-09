<?php

namespace frontend\controllers;

use Yii;
use yii\rest\Controller;
use frontend\models\Banners;

class BannersController extends Controller
{
    public function actionIndex(){
            $bannerModel = new Banners();
            $banners = $bannerModel->listBanners();
            return $banners;

    }
}