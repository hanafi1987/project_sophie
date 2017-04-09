<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;
use backend\models\Users as Users;

/**
 * Site controller
 */
class AccessController extends Controller
{
    public function actionLogin()
    {
        $request = Yii::$app->request;

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if ($request->isPost) {
            $model = new LoginForm();
            if ($model->load($request->post()) && $model->login()) {
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('failed', 'Username or Password does not match!');
                return $this->render('login', [
                    'model' => $model
                ]);
            }
        }else{
            return $this->render('login');
        }

    }

    public function actionRegister()
    {
        $request = Yii::$app->request;

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if ($request->isPost) {
            $fullname = $request->post('name');
            $email = $request->post('email');
            $password = $request->post('password');
            $model = Users::createUser($fullname, $email, $password);
            if($model!=false){
                Yii::$app->session->setFlash('success','Successfully Registered! You can now login');
                return $this->render('login', [
                    'model' => $model
                ]);
            }else if($model==false){
                Yii::$app->session->setFlash('failed','Email have been used');
                return $this->render('register', [
                'model' => $model
            ]);
            }

        }else {
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                Yii::$app->session->setFlash('success', 'Successfully Registered!');
                return $this->goBack();
            } else {
                return $this->render('register', [
                    'model' => $model
                ]);
            }
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
