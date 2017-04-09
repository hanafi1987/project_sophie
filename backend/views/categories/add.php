<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Add Category | Sophie Malaysia';
?>


<h1 class="page-title"> Add Category
    <small>Add New Product Category</small>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?= Url::to('/') ?>">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?= Url::to('/products') ?>">Products</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?= Url::to('/products/categories') ?>">Categories</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Add Category</span>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(['id' => 'cat-form', 'options' => ['class' => 'cat-form']
        ]); ?>
        <div class="portlet light portlet-fit portlet-form ">
            <div class="portlet-body">


                <div class="form-body">
                    <?php if ($model->hasErrors()) {
                        echo '<div class="row"><div class="col-md-12"><div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a> ' . $form->errorSummary($model) . '</div></div></div>';

                    } ?>
                    <div class="form-group form-md-line-input">
                        <input type="text" class="form-control" name="Categories[cat_name]" id="form_control_1"
                               placeholder="Enter Category" value="<?= $model->cat_name; ?>">
                        <label for="form_control_1">Category
                            <span class="required">*</span>
                        </label>
                        <span class="help-block">Enter Category...</span>
                    </div>
                    <div class="form-group form-md-line-input">
                        <input type="text" class="form-control input-large" data-role="tagsinput" name="Categories[subcat_name]"
                               id="subcat_id"
                               placeholder="Enter Subcategory" value="<?= $model->subcat_name; ?>">
                        <label for="form_control_1">Subcategory
                            <span class="required">*</span>
                        </label>
                        <span class="help-block">Enter Subcategory...</span>
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
