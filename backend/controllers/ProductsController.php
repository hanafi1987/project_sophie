<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Products as Products;
use backend\models\Categories as Categories;
use backend\models\Img as Img;
use yii\web\UploadedFile;


class ProductsController extends Controller
{

    public $layout = "products";
    public $sidebar = "products";


    public function actionProducts()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $model = new Products();
            return $this->render('index', ['model' => $model->listProducts()]);
        }
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $model = new Products();
            $catmodel = new Categories();
            $cat = $catmodel->listCategories();
            return $this->render('add', ['model' => $model, 'cat' => $cat]);
        }

    }


    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $catmodel = new Categories();
            $cat = $catmodel->listCategories();
            $request = Yii::$app->request;
            $model = new Products();
            $model->load($request->post());
            if ($model->validate()) {
                if ($model->createProduct($request->post())) {
                    return $this->redirect('/products');
                } else {

                    return $this->render('add', ['model' => $model, 'cat' => $cat]);
                }
            } else {
                return $this->render('add', ['model' => $model, 'cat' => $cat]);
            }
        }
    }

    public function actionEdit()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $catmodel = new Categories();
            $cat = $catmodel->listCategories();
            $request = Yii::$app->request;
            $model = new Products();
            if ($request->get()) {
                $product = $model->findProduct($request->get('id'));
                $model->product_name = $product['name'];
                $model->supplier = $product['supplier_id'];
                $model->unitprice = $product['unit_price'];
                $model->discounts = $product['discount'];
                $model->sku = $product['sku_serial'];
                $model->quantity = $product['quantity'];
                $model->category = $product['subcategories'];
                $model->featuredfile = $product['img_id'];
                $model->desc = $product['descriptions'];
                $model->display = $product['product_status'];
                $model->featuredfile = $product['img_id'];
                return $this->render('edit', [
                    'model' => $model, 'cat' => $cat
                ]);

            } else {
                return $this->redirect('/products');
            }
        }
    }

    public function actionUpdate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $catmodel = new Categories();
            $cat = $catmodel->listCategories();
            $request = Yii::$app->request;
            $model = new Products();
            $model->load($request->post());
            $post = $request->post();
            $model->product_name = $post['Products']['product_name'];
            $model->supplier = $post['Products']['supplier'];
            $model->unitprice = $post['Products']['unitprice'];
            $model->discounts = $post['Products']['discounts'];
            $model->sku = $post['Products']['sku'];
            $model->quantity = $post['Products']['quantity'];
            $model->category = $post['Products']['category'];
            $model->featuredfile = $post['Products']['featuredfile'];
            $model->desc = $post['Products']['desc'];
            $model->display = $post['Products']['display'];
            if ($model->validate()) {
                $model->updateProduct($post, $request->get('id'));
                Yii::$app->session->setFlash('success', 'Successfully Update!');
                return $this->render('edit', ['model' => $model, 'cat' => $cat]);
            } else {
                return $this->render('edit', ['model' => $model, 'cat' => $cat]);
            }
        }
    }

    public function actionDelete()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $model = new Products();
            if ($request->get()) {
                $model->deleteProduct($request->get('id'));
                if ($request->get('r') == 'dashboard') {
                    return $this->redirect('/');
                } else {
                    return $this->redirect('/products');
                }
            } else {
                return $this->render('index', [
                    'model' => $model
                ]);
            }
        }
    }

    /**
     * @var UploadedFile
     */
    public function actionFeatureupload()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $featured = new Products();
            $featured->load($request->post());
            $featured->featured = UploadedFile::getInstanceByName('featuredFile');
            $file_url = null;
            if (isset($featured->featured)) {
                $feature_img = $featured->uploadFeatured();
            }
            return json_encode($feature_img);
        }
    }

    public function actionPreview()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $preview_id = $request->queryParams['preview_id'];
            $img = new Img();
            $preview = $img->imgById($preview_id);
            $previewArray = array("name" => $preview->name, "size" => $preview->size, "img_path" => $preview->img_path);

            return json_encode($previewArray);
        }

    }

    public function actionDeletefeature()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        } else {
            $request = Yii::$app->request;
            $id = $request->post('id');
            $img = new Img();
            $img->deleteImg($id);
        }
    }

    public function beforeAction($action)
    {

        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);

    }
}