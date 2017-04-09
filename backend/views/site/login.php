<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="user-login-5">
    <div class="row bs-reset">
        <div class="col-md-6 bs-reset mt-login-5-bsfix">
            <div class="login-bg" style="background-image:url('/img/login/bg1.jpg')">
                <img class="login-logo" src="/img/login/sophie-logo.png" height="40"/></div>
        </div>
        <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
            <div class="login-content">
                <h1>Sophie Admin Login</h1>
                <?php $form = ActiveForm::begin(['options' => ['class' => 'login-form']]); ?>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>Enter any username and password. </span>
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
                    <div class="col-sm-8 text-right col-sm-offset-4">
                        <div class="forgot-password">Ø
                            <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                        </div>
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