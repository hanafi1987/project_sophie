<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Supplier as Supplier;
use yii\web\UploadedFile;

class SupplierController extends Controller
{

    public $layout = "admin";
    public $sidebar = "supplier";


    public function actionSupplier()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $model = new Supplier();
            return $this->render('index', ['model' => $model->listSupplier()]);
        }
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $model = new Supplier();
            return $this->render('add', ['model' => $model]);
        }

    }

    /**
     * @var UploadedFile
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest) {
            $request = Yii::$app->request;
            $model = new Supplier();
            $model->load($request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->validate()) {
                if ($file = $model->upload()) {
                    $model->createSupplier($request->post(), $file);
                    return $this->redirect('/supplier');
                } else {

                    return $this->render('add', ['model' => $model]);
                }
            } else {
                return $this->render('add', ['model' => $model]);
            }
        }else{
            return $this->redirect('/login');
        }
    }

    public function actionEdit()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $model = new Supplier();
            if ($request->get()) {
                $supplier = $model->findBrand($request->get('id'));
                $model->supplier_name = $supplier['name'];
                $model->imageFile = $supplier['img_path'];
                return $this->render('edit', [
                    'model' => $model,
                ]);

            } else {
                return $this->redirect('/supplier');
            }
        }
    }

    public function actionUpdate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $model = new Supplier();
            $model->scenario = Supplier::SCENARIO_UPDATE;
            $model->load($request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->validate()) {
                $file = null;
                if (isset($model->imageFile)) {
                    $file = $model->upload();
                    $model->imageFile = $file->img_path;
                } else {
                    $post = $request->post();
                    $model->imageFile = $post['Supplier']['imageFile_hidden'];
                }
                $model->updateBrand($request->post(), $request->get('id'), $file);

                Yii::$app->session->setFlash('success', 'Successfully Update!');
                return $this->render('edit', ['model' => $model]);
            } else {
                $post = $request->post();
                $model->supplier_name = $post['Supplier']['supplier_name'];
                $model->imageFile = $post['Supplier']['imageFile_hidden'];
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
            $model = new Supplier();
            if ($request->get()) {
                $model->deleteSupplier($request->get('id'));
                return $this->redirect('/supplier');
            } else {
                return $this->render('index', [
                    'model' => $model
                ]);
            }
        }
    }
}