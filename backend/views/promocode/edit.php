<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use backend\models\Param;
$param = new Param();
$this->title = 'Edit Promo Code | Sophie Malaysia';
?>


<h1 class="page-title"> Edit Promo Code
    <small>Edit Promo Code for Product Discount</small>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?= Url::to('/') ?>">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?= Url::to('/promocode') ?>">Promo Code</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Edit Promo Code</span>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(['id' => 'promocode-form', 'options' => ['class' => 'promocode-form']
        ]); ?>
        <div class="portlet light portlet-fit portlet-form ">
            <div class="portlet-body">


                <div class="form-body">
                    <?php if ($model->hasErrors()) {
                        echo '<div class="row"><div class="col-md-12"><div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a> ' . $form->errorSummary($model) . '</div></div></div>';

                    } ?>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="code"
                                       placeholder="Enter Promo Code Here.." name="PromoCode[code]" value="<?=$model->code?>">
                                <label for="form_control_1">Promo Code</label>
                                <span class="help-block">Enter Promo Code Here..</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form-md-line-input">
                                <select class="bs-select selectpicker form-control" id="min_type"
                                        data-size="3" name="PromoCode[min_type]">
                                    <option value="">- Select -</option>
                                    <?php $param = new Param();
                                    $param->listParam('minpq', $model->min_type); ?>
                                </select>
                                <label for="form_control_1">Type of Minimum</label>
                            </div>
                        </div>
                        <div class="col-md-3" id="min_purch" <?php if($model->min_type=='8'){ echo 'style="display: block"'; }else{ echo 'style="display: none"'; }?>>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="min1"
                                       placeholder="Enter Minimum Purchase (RM) Here.." name="PromoCode[min_purch]" value="<?=$model->min_purch?>">
                                <label for="form_control_1">Minimum Purchase (RM)</label>
                                <span class="help-block">Enter Minimum Purchase (RM) Here..</span>
                            </div>
                        </div>
                        <div class="col-md-3" id="min_qtty" <?php if($model->min_type=='9'){ echo 'style="display: block"'; }else{ echo 'style="display: none"'; }?>>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="min2"
                                       placeholder="Enter Minimum Quantity Here.." name="PromoCode[min_qtty]" value="<?=$model->min_qtty?>">
                                <label for="form_control_1">Minimum Quantity</label>
                                <span class="help-block">Enter Minimum Quantity Here..</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form-md-line-input">
                                <select class="bs-select selectpicker form-control" id="disc_type"
                                        data-size="3" name="PromoCode[disc_type]">
                                    <option value="">- Select -</option>
                                    <?php $param = new Param();
                                    $param->listParam('dsctype', $model->disc_type); ?>
                                </select>
                                <label for="form_control_1">Type of Discount</label>
                            </div>
                        </div>
                        <div class="col-md-3" id="disc_percent" <?php if($model->disc_type=='10'){ echo 'style="display: block"'; }else{ echo 'style="display: none"'; }?>>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="dsc1"
                                       placeholder="Enter Discount in Percentage(%)" name="PromoCode[disc_percent]" value="<?=$model->disc_percent?>">
                                <label for="form_control_1">Discount (%)</label>
                                <span class="help-block">Enter Discount in Percentage(%)</span>
                            </div>
                        </div>
                        <div class="col-md-3" id="disc_money" <?php if($model->disc_type=='11'){ echo 'style="display: block"'; }else{ echo 'style="display: none"'; }?>>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="dsc2"
                                       placeholder="Enter Discount in RM.." name="PromoCode[disc_money]" value="<?=$model->disc_money?>">
                                <label for="form_control_1">Discount (RM)</label>
                                <span class="help-block">Enter Discount in RM..</span>
                            </div>
                        </div>
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
        <?php ActiveForm::end(); ?>
    </div>
</div>
