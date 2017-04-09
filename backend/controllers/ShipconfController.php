<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\ShipConfig as ShipConfig;

class ShipconfController extends Controller
{

    public $layout = "admin";
    public $sidebar = "configuration";


    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $model = new ShipConfig();
            return $this->render('index', ['model' => $model->listShipConfig()]);
        }
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $model = new ShipConfig();
            return $this->render('add', ['model' => $model]);
        }

    }

    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $model = new ShipConfig();
            $model->load($request->post());
            if ($model->validate()) {
                $model->createShipConfig($request->post());
                return $this->redirect('/configuration/shipping');
            } else {
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
            $model = new ShipConfig();
            if ($request->get()) {
                $shipconf = $model->findShipConfig($request->get('id'));
                $model->countries = $shipconf['countries_id'];
                $model->min_purch = $shipconf['min_purchase'];
                $model->min_qtty = $shipconf['min_quantity'];
                $model->fee = $shipconf['normal_fees'];
                return $this->render('edit', [
                    'model' => $model,
                ]);

            } else {
                return $this->redirect('/configuration/shipping');
            }
        }
    }

    public function actionUpdate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $model = new ShipConfig();
            $model->load($request->post());
            if ($model->validate()) {
                $model->updateShipConfig($request->post(), $request->get('id'));
                Yii::$app->session->setFlash('success', 'Successfully Update!');
                return $this->render('edit', ['model' => $model]);
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
            $model = new ShipConfig();
            if ($request->get()) {
                $model->deleteShipConfig($request->get('id'));
                return $this->redirect('/configuration/shipping');
            } else {
                return $this->render('index', [
                    'model' => $model
                ]);
            }
        }
    }
}