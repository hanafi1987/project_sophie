<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\PromoCode;
use backend\models\Banners;
use backend\models\Supplier;
use backend\models\Products;


class DashboardController extends Controller
{
    public $layout = "admin";
    public $sidebar = "dashboard";

    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {

            $supplier = new Banners();
            $bannerCount = $supplier->getNumberOfBanners();
            $promocode = new PromoCode();
            $promoCount = $promocode->getNumberOfPromocode();
            $supplier = new Supplier();
            $supplierCount = $supplier->getNumberOfSupplier();
            $product = new Products();
            $productCount = $product->getNumberOfProduct();
            $productShowcase = $product->listProductsLimit(4);

            return $this->render('index',
                ["sidebar" => $this->sidebar,
                    'bannerCount' => $bannerCount,
                    'promoCount' => $promoCount,
                    'supplierCount' => $supplierCount,
                    'productCount' => $productCount,
                    'productShowcase' => $productShowcase]);
        }
    }
}