<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Banners as Banners;
use yii\web\UploadedFile;

class BannersController extends Controller
{

    public $layout = "admin";
    public $sidebar = "banners";


    public function actionBanners()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $model = new Banners();
            return $this->render('index', ['model' => $model->listBanners()]);
        }
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $model = new Banners();
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
            $model = new Banners();
            $model->load($request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->validate()) {
                if ($file = $model->upload()) {
                    $model->createBanner($request->post(), $file);
                    return $this->redirect('/banners');
                } else {

                    return $this->render('add', ['model' => $model]);
                }
            } else {
                $post = $request->post();
                $model->display = $post['Banners']['display'];
                return $this->render('add', ['model' => $model]);
            }
        }else{
            return $this->redirect('/login');
        }
    }

    public function actionEdit()
    {
        if (!Yii::$app->user->isGuest) {
            $request = Yii::$app->request;
            $model = new Banners();
            if ($request->get()) {
                $banner = $model->findBanner($request->get('id'));
                $model->banner_title = $banner['name'];
                $model->url = $banner['url'];
                $model->display = $banner['status'];
                $model->imageFile = $banner['img_path'];
                return $this->render('edit', [
                    'model' => $model,
                ]);

            } else {
                return $this->redirect('/banners');
            }
        }else{
            return $this->redirect('/login');
        }
    }

    public function actionUpdate()
    {
        if (!Yii::$app->user->isGuest) {
            $request = Yii::$app->request;
            $model = new Banners();
            $model->scenario = Banners::SCENARIO_UPDATE;
            $model->load($request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->validate()) {
                $file = null;
                if (isset($model->imageFile)) {
                    $file = $model->upload();
                    $model->imageFile = $file->img_path;
                } else {
                    $post = $request->post();
                    $model->imageFile = $post['Banners']['imageFile_hidden'];
                }
                $model->updateBanner($request->post(), $request->get('id'), $file);

                Yii::$app->session->setFlash('success', 'Successfully Update!');
                return $this->render('edit', ['model' => $model]);
            } else {
                $post = $request->post();
                $model->banner_title = $post['Banners']['banner_title'];
                $model->url = $post['Banners']['url'];
                if (isset($post['Banners']['display'])) {
                    $model->display = $post['Banners']['display'];
                }
                $model->imageFile = $post['Banners']['imageFile_hidden'];
                return $this->render('edit', ['model' => $model]);
            }
        }else{
            return $this->redirect('/login');
        }
    }

    public function actionDelete()
    {
        if (!Yii::$app->user->isGuest) {
            $request = Yii::$app->request;
            $model = new Banners();
            if ($request->get()) {
                $model->deleteBanner($request->get('id'));
                return $this->redirect('/banners');
            } else {
                return $this->render('index', [
                    'model' => $model
                ]);
            }
        }else{
            return $this->redirect('/login');
        }
    }
}