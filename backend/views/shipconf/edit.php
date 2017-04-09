<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use backend\models\Countries;

$this->title = 'Add Shipping Configuration | Sophie Malaysia';
?>


<h1 class="page-title"> Edit Shipping Configuration
    <small>Edit Shipping Configuration, Exceed Minimum Purchase or Quantity Equal to Free Shipping</small>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?= Url::to('/') ?>">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Configuration</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?= Url::to('/configuration/shipping') ?>">Shipping</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Edit Shipping Configuration</span>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(['id' => 'ship-form', 'options' => ['class' => 'ship-form']
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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <select class="bs-select selectpicker form-control" data-live-search="true"
                                        data-size="8" name="ShipConfig[countries]">
                                    <?php $countries = new Countries();
                                    $countries->listCountries($model->countries); ?>
                                </select>
                                <label for="form_control_1">Country</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="min_purchase"
                                       placeholder="Enter Minimum Purchase (RM) Here.." name="ShipConfig[min_purch]" value="<?=$model->min_purch?>">
                                <label for="form_control_1">Minimum Purhase (RM)</label>
                                <span class="help-block">Enter Minimum Purchase (RM) Here..</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="min_quantity"
                                       placeholder="Enter Minimum Quantity Here. Leave empty if does not need" name="ShipConfig[min_qtty]" value="<?=$model->min_qtty?>">
                                <label for="form_control_1">Minimum Quantity</label>
                                <span class="help-block">Enter Minimum Quantity Here. Leave empty if does not need</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="fee"
                                       placeholder="Enter Normal Fee (RM) Here.." name="ShipConfig[fee]" value="<?=$model->fee?>">
                                <label for="form_control_1">Normal Fee (RM)</label>
                                <span class="help-block">Normal Fee(RM) Here..</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <small><span class="red">*</span> Normal Fee will be waived after achieved minimum requirement</small>
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
