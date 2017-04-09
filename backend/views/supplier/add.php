<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Add Supplier| Sophie Malaysia';
?>


<h1 class="page-title"> Add Supplier
    <small>Add New Supplier of a Company</small>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?=Url::to('/')?>">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?=Url::to('/suppliers')?>">Supplier</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Add Supplier</span>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(['id' => 'supplier-form', 'options' => ['class' => 'supplier-form', 'enctype' => 'multipart/form-data']
        ]); ?>
        <div class="portlet light portlet-fit portlet-form ">
            <div class="portlet-body">


                <div class="form-body">
                    <?php if ($model->hasErrors()) {
                        echo '<div class="row"><div class="col-md-12"><div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a> ' . $form->errorSummary($model) . '</div></div></div>';

                    } ?>
                    <div class="form-group form-md-line-input">
                        <input type="text" class="form-control" name="Supplier[supplier_name]" id="form_control_1"
                               placeholder="Enter supplier name" value="<?= $model->supplier_name; ?>">
                        <label for="form_control_1">Supplier Name
                            <span class="required">*</span>
                        </label>
                        <span class="help-block">Enter Supplier name...</span>
                    </div>
                    <div class="form-group">
                        <label for="form_control_1">Browse Supplier Logo</label>
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
                                                                <input type="file" id="imgFile" name="Supplier[imageFile]"> </span>
                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn green">Save</button>
                        <button type="reset" class="btn default">Reset</button>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>