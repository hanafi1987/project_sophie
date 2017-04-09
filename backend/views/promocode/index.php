<?php
use yii\helpers\Url;
use backend\models\Param;

$param = new Param();
$this->title = 'All Promo Code | Sophie Malaysia';
?>
<h1 class="page-title"> All Promo Code
    <small>Manage Promo Code Here</small>
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
            <span>All Promo Code</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a id="add_new" class="btn sbold green" href="/promocode/add"> Add New
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover  order-column"
                       id="data_list">
                    <thead>
                    <tr>

                        <th> Promo Code</th>
                        <th class="text-center" width="15%"> Discounts</th>
                        <th class="text-center" width="15%"> Minimum Requirement</th>
                        <th class="text-center" width="8%"> Updated At</th>
                        <th class="text-center" width="12%"> Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model as $promocode) {
                        $min_disc = json_decode($promocode['params'], true);
                        ?>
                        <tr class="odd gradeX">
                            <td><?= $promocode['promo_code'] ?></td>
                            <td class="text-center"><?= $param->getParamByID($min_disc['disc_type']) . ': ' . $min_disc['disc']; ?>
                            </td>
                            <td class="text-center"><?= $param->getParamByID($min_disc['min_type']) . ': ' . $min_disc['min']; ?>
                            </td>
                            <td class="text-center"><?= date('d/m/Y h:i A', strtotime($promocode['updated_at'])) ?>
                            </td>
                            <td class="text-center">
                                <a type="button" class="btn btn-xs yellow "
                                   href="<?= URL::to(['promocode/edit', 'id' => $promocode['id']]) ?>">Update</a>
                                <button type="button" class="btn btn-xs red" data-toggle="confirmation"
                                        data-original-title="Are you sure?"
                                        href="<?= URL::to(['promocode/delete', 'id' => $promocode['id']]) ?>">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
