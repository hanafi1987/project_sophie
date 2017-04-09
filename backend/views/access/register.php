<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Register | Sophie Malaysia';
?>
<div class="user-login-5">
    <div class="row bs-reset">
        <div class="col-md-6 bs-reset mt-login-5-bsfix">
            <div class="login-bg" style="background-image:url('/img/login/bg1.jpg')">
                <img class="login-logo" src="/img/login/sophie-logo.png" height="40"/></div>
        </div>
        <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
            <div class="login-content">
                <h1>Sophie Registration</h1>
                <?php $form = ActiveForm::begin(['options' => ['class' => 'login-form']]); ?>
                <?php if (Yii::$app->session->hasFlash('failed')) {
                    echo '<div class="alert alert-danger alert-dismissable" >
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button" > ×</button >'.
                        Yii::$app->session->getFlash('failed').'
                        </div >';
                } ?>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>Enter Fullname, Email and password. </span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <input class="form-control form-control-solid placeholder-no-fix form-group" type="text"
                               autocomplete="off" placeholder="Full Name" name="name" required/></div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <input class="form-control form-control-solid placeholder-no-fix form-group" type="text"
                               autocomplete="off" placeholder="Email" name="email" required/></div>
                    <div class="col-xs-6">
                        <input class="form-control form-control-solid placeholder-no-fix form-group" type="password"
                               autocomplete="off" placeholder="Password" name="password" required/></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="login-link">
                            <a href="<?php echo Url::to('/login'); ?>" id="login-link" class="login-link"><< Sign
                                In</a>
                        </div>
                    </div>
                    <div class="col-sm-8 text-right">
                        <button class="btn red" type="submit">Sign Up</button>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
            <div class="login-footer">
                <div class="row bs-reset">
                    <div class="col-xs-5 bs-reset">
                        <ul class="login-social">
                            <li>
                                <a href="https://www.facebook.com/HermoMalaysia/" target="_blank">
                                    <i class="icon-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/hermomalaysia" target="_blank">
                                    <i class="icon-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-social-dribbble"></i>
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