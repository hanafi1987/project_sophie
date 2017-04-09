<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Categories as Categories;

class CategoriesController extends Controller
{

    public $layout = "admin";
    public $sidebar = "products";


    public function actionCategories()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $model = new Categories();
            return $this->render('index', ['model' => $model->listCategories()]);
        }
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $model = new Categories();
            return $this->render('add', ['model' => $model]);
        }

    }

    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $model = new Categories();
            $model->load($request->post());
            if ($model->validate()) {
                $model->createCategory($request->post());
                return $this->redirect('/products/categories');
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
            $model = new Categories();
            if ($request->get()) {
                $cat = $model->findCategory($request->get('id'));
                $model->cat_id = $cat['id'];
                $model->cat_name = $cat['name'];
                return $this->render('edit', [
                    'model' => $model,
                ]);

            } else {
                return $this->redirect('/products/categories');
            }
        }
    }

    public function actionUpdate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $model = new Categories();
            $model->load($request->post());
            if ($model->validate()) {
                $model->updateCategory($request->post(), $request->get('id'));
                return $this->redirect('/products/categories');
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
            $model = new Categories();
            if ($request->get()) {
                $model->deleteCategory($request->get('id'));
                return $this->redirect('/products/categories');
            } else {
                return $this->render('index', [
                    'model' => $model
                ]);
            }
        }
    }
}