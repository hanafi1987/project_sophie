<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\PromoCode as PromoCode;

class PromocodeController extends Controller
{

    public $layout = "admin";
    public $sidebar = "promocode";


    public function actionPromocode()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $model = new PromoCode();
            return $this->render('index', ['model' => $model->listPromoCode()]);
        }
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $model = new PromoCode();
            return $this->render('add', ['model' => $model]);
        }

    }

    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $model = new PromoCode();
            $model->load($request->post());
            if ($model->validate()) {
                $model->createPromoCode($request->post());
                return $this->redirect('/promocode');
            } else {
                $post = $request->post();
                $model->code = $post['PromoCode']['code'];
                $model->min_purch = $post['PromoCode']['min_purch'];
                $model->min_qtty = $post['PromoCode']['min_qtty'];
                $model->min_type = $post['PromoCode']['min_type'];
                $model->disc_type = $post['PromoCode']['disc_type'];
                $model->disc_percent = $post['PromoCode']['disc_percent'];
                $model->disc_money = $post['PromoCode']['disc_money'];
                return $this->render('add', ['model' => $model]);
            }
        }
    }

    public function actionEdit()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $model = new PromoCode();
            if ($request->get()) {
                $promocode = $model->findPromoCode($request->get('id'));
                $model->code = $promocode['promo_code'];
                $params = json_decode($promocode['params']);
                $model->min_type = $params->min_type;
                $model->disc_type = $params->disc_type;
                if ($params->min_type == 8) {
                    $model->min_purch = $params->min;
                } else if ($params->min_type == 9) {
                    $model->min_qtty = $params->min;
                }
                if ($params->disc_type == 10) {
                    $model->disc_percent = $params->disc;
                } else if ($params->disc_type == 11) {
                    $model->disc_money = $params->disc;
                }
                return $this->render('edit', [
                    'model' => $model,
                ]);

            } else {
                return $this->redirect('/promocode');
            }
        }
    }

    public function actionUpdate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $model = new PromoCode();
            $model->load($request->post());
            if ($model->validate()) {
                $model->updatePromoCode($request->post(), $request->get('id'));
                return $this->redirect('/promocode');
            } else {
                return $this->render('edit', ['model' => $model]);
            }
        }
    }

    public function actionDelete()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $model = new PromoCode();
            if ($request->get()) {
                $model->deletePromoCode($request->get('id'));
                return $this->redirect('/promocode');
            } else {
                return $this->render('index', [
                    'model' => $model
                ]);
            }
        }
    }
}