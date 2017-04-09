<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login | Sophie Malaysia';
?>
<div class="user-login-5">
    <div class="row bs-reset">
        <div class="col-md-6 bs-reset mt-login-5-bsfix">
            <div class="login-bg" style="background-image:url('/img/login/bg1.jpg')">
                <img class="login-logo" src="/img/login/sophie-logo.png" height="40"/></div>
        </div>
        <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
            <div class="login-content">
                <h1>Sophie Login</h1>
                <?php $form = ActiveForm::begin(['id'=>'login-form', 'options' => ['class' => 'login-form'],
                    'fieldConfig' => [
                        'template' => "{label}<div class='col-lg-3'>{input}</div><div class='col-lg-7'>{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-2 control-label'],
                    ]]); ?>
                <?php if (Yii::$app->session->hasFlash('failed')) {
                    echo '<div class="alert alert-danger alert-dismissable" >
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button" > ×</button >'.
                        Yii::$app->session->getFlash('failed').'
                        </div >';
                }
                if(Yii::$app->session->hasFlash('success')){
                    echo '<div class="alert alert-success alert-dismissable" >
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button" > ×</button >'.
                        Yii::$app->session->getFlash('success').'
                        </div >';
                } ?>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>Please Enter Email and Password. </span>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <input class="form-control form-control-solid placeholder-no-fix form-group" type="text"
                               autocomplete="off" placeholder="Email" name="LoginForm[email]" required/></div>
                    <div class="col-xs-6">
                        <input class="form-control form-control-solid placeholder-no-fix form-group" type="password"
                               autocomplete="off" placeholder="Password" name="LoginForm[password]" required/></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="register-link">
                            <a href="<?php echo Url::to('/register'); ?>" id="register-link" class="register-link">Sign
                                Up</a>
                        </div>
                        <div class="rem-password">
                            <label class="rememberme mt-checkbox mt-checkbox-outline">
                                <input type="checkbox" name="LoginForm[rememberMe]" value="1" /> Remember me
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-8 text-right">

                        <button class="btn green" type="submit">Sign In</button>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
            <div class="login-footer">
                <div class="row bs-reset">
                    <div class="col-xs-5 bs-reset">
                        <ul class="login-social">
                            <li>
                                <a href="#" target="_blank">
                                    <i class="icon-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="icon-social-twitter"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-xs-7 bs-reset">
                        <div class="login-copyright text-right">
                            <p>Copyright &copy; Sophie Malaysia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>