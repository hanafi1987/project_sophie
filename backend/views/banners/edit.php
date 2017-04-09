<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Edit Banner | Sophie Malaysia';
?>


<h1 class="page-title"> Edit Banner
    <small>Edit Banner With It's Title and URL</small>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?=Url::to('/')?>">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?=Url::to('/banners')?>">Banners</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Edit Banner</span>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(['id' => 'banner-form', 'options' => ['class' => 'banner-form', 'enctype' => 'multipart/form-data']
        ]); ?>
        <div class="portlet light portlet-fit portlet-form ">
            <div class="portlet-body">


                <div class="form-body">
                    <?php if ($model->hasErrors()) {
                        echo '<div class="row"><div class="col-md-12"><div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a> ' . $form->errorSummary($model) . '</div></div></div>';

                    } ?>
                    <?php if (Yii::$app->session->hasFlash('success')) {
                        echo '<div class="alert alert-success alert-dismissable" >
                            <button aria - hidden = "true" data - dismiss = "alert" class="close" type = "button" > ×</button >'.
                        Yii::$app->session->getFlash('success').'
                        </div >';
                    } ?>
                    <div class="form-group form-md-line-input">
                        <input type="text" class="form-control" name="Banners[banner_title]" id="form_control_1"
                               placeholder="Enter banner title" value="<?= $model->banner_title ?>">
                        <label for="form_control_1">Title
                            <span class="required">*</span>
                        </label>
                        <span class="help-block">Enter banner title...</span>
                    </div>
                    <div class="form-group form-md-line-input">
                        <input type="text" class="form-control" id="form_control_1" name="Banners[url]"
                               placeholder="Enter your Url" value="<?= $model->url; ?>">
                        <label for="form_control_1">URL
                            <span class="required">*</span>
                        </label>
                        <span class="help-block">Enter URL to link banner with</span>
                    </div>
                    <div class="form-group">
                        <label for="form_control_1">Display to Site?
                            <span class="required">*</span>
                        </label>
                        <div style="clear:both"></div>
                        <input type="checkbox" name="Banners[display]" class="make-switch"
                               data-on-color="success" data-off-color="danger" data-on-value="0"
                               data-off-value="1" <?php if ($model->display == 0) {
                            echo 'checked';
                        } ?>>
                        <span class="help-block">ON to Display. OFF to not Display</span>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="Banners[imageFile_hidden]" value="<?= $model->imageFile ?>">
                        <img src="<?= '/' . $model->imageFile ?>"
                             alt="" style="max-height: 250px; margin-bottom: 25px;"/>
                        <div style="clear:both"></div>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="input-group input-large">
                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                    <span class="fileinput-filename"> </span>
                                </div>
                                <span class="input-group-addon btn default btn-file">
                                                                <span class="fileinput-new"> Select file </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" id="imgFile" name="Banners[imageFile]"> </span>
                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn green">Update</button>
                                <button type="reset" class="btn default">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>