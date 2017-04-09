<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use backend\models\SubCategories;
use backend\models\Supplier;

$this->title = 'Add Product | Sophie Malaysia';
?>


<h1 class="page-title"> Add Product
    <small>Add New Product</small>
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
            <span>Add Product</span>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(['id' => 'product-form', 'options' => ['class' => 'product-form', 'enctype' => 'multipart/form-data']
        ]); ?>
        <div class="portlet light portlet-fit portlet-form ">
            <div class="portlet-body">


                <div class="form-body">
                    <?php if ($model->hasErrors()) {
                        echo '<div class="row"><div class="col-md-12"><div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a> ' . $form->errorSummary($model) . '</div></div></div>';

                    } ?>
                    <div class="row no-gutter">
                        <div class="col-lg-9">
                            <div class="col-md-10">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="Products[product_name]"
                                           id="form_control_1"
                                           placeholder="Enter product name" value="<?= $model->product_name; ?>">
                                    <label for="form_control_1">Product Name
                                        <span class="required">*</span>
                                    </label>
                                    <span class="help-block">Enter product name...</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <select id="category_splitter" class="bs-select selectpicker form-control"
                                            name="Products[brand]">
                                        <?php $supplier = new Supplier();
                                        $supplier->listSupplierSelect($model->brand); ?>
                                    </select>
                                    <label for="form_control_1">Supplier</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" id="unitprice"
                                           placeholder="Enter price per unit here.." name="Products[unitprice]"
                                           value="<?= $model->unitprice; ?>">
                                    <label for="form_control_1">Unit Price</label>
                                    <span class="help-block">Enter price per unit here..</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" id="discounts"
                                           placeholder="Enter discount per unit here.." name="Products[discounts]"
                                           value="<?= $model->discounts; ?>">
                                    <label for="form_control_1">Discount Price</label>
                                    <span class="help-block">Enter Discount per unit here..</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h4><strong>Price After Discounts</strong></h4>
                                <span id="price_after_discount"><?php
                                $discounted_price = $model->unitprice - $model->discounts;
                                if($discounted_price>0){
                                    echo 'RM '.number_format((float)$discounted_price, 2, '.', '');
                                }else{
                                    echo '-';
                                }

                                    ?></span>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" id="sku"
                                           placeholder="Enter SKU here.." name="Products[sku]"
                                           value="<?= $model->sku; ?>">
                                    <label for="form_control_1">SKU</label>
                                    <span class="help-block">Enter SKU here..</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" id="quantity"
                                           placeholder="Enter product quantity here.." name="Products[quantity]"
                                           value="<?= $model->quantity; ?>">
                                    <label for="form_control_1">Quantity</label>
                                    <span class="help-block">Enter product quantity here..</span>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="form-group form-md-line-input">
                                    <select id="category_splitter" data-selectsplitter-selector class="form-control"
                                            size="6" name="Products[category]">
                                        <?php foreach ($cat as $catgroup) { ?>
                                            <optgroup label="<?php echo $catgroup['name']; ?>">
                                                <?php $subcat = new SubCategories();
                                                $subcat->getSubCategoriesSelect($catgroup['id'], $model->category); ?>
                                            </optgroup>
                                        <?php } ?>
                                    </select>
                                    <label for="form_control_1">Category</label>
                                    <span class="help-block">Select Category for the product</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="dropzone dropzone-file-area" id="featureddropzone">
                                <div class="dz-message" data-dz-message>
                                    <i class="fa fa-upload"></i>
                                    <h3><strong>Upload Featured Product Here</strong></h3>
                                </div>
                            </div>
                            <input type="hidden" name="Products[featuredfile]" id="featuredfile" value="<?=$model->featuredfile?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group form-md-line-input">
                                <textarea type="text" id="desc" name="Products[desc]"><?= $model->desc ?></textarea>
                                <label for="form_control_1">Product Descriptions
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block">Enter product descriptions</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="form_control_1">Display to Site?
                            <span class="required">*</span>
                        </label>
                        <div style="clear:both"></div>
                        <input type="checkbox" name="Products[display]" class="make-switch"
                               data-on-color="success" data-off-color="danger" data-on-value="0"
                               data-off-value="1" <?php if ($model->display == 'on') {
                            echo 'checked';
                        } ?>>
                        <span class="help-block">ON to Display. OFF to not Display</span>
                    </div>
                </div>

            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn green start">Save</button>
                        <button type="reset" class="btn default">Reset</button>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
