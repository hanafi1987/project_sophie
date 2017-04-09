<?php
use yii\helpers\Url;
use backend\models\SubCategories;
$this->title = 'All Categories | Sophie Malaysia';
?>
<h1 class="page-title"> All Shipping Configuration
    <small>Manage Shipping Configuration Here</small>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?=Url::to('/')?>">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Configuration</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?=Url::to('/configuration/shipping')?>">Shipping</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>All Shipping Configuration</span>
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
                                <a id="add_new" class="btn sbold green" href="/configuration/shipping/add"> Add New
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

                        <th> Countries</th>
                        <th class="text-center" width="15%"> Minimum Purchase</th>
                        <th class="text-center" width="15%"> Minimum Quantity</th>
                        <th class="text-center" width="8%"> Updated At</th>
                        <th class="text-center" width="12%"> Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model as $shipconf) { ?>
                        <tr class="odd gradeX">
                            <td><?= $shipconf['name'] ?></td>
                            <td class="text-center"><?= $shipconf['min_purchase'] ?>
                            </td>
                            <td class="text-center"><?= $shipconf['min_quantity']? $shipconf['min_quantity']: '-'?>
                            </td>
                            <td class="text-center"><?=date('d/m/Y h:i A', strtotime($shipconf['updated_at']))?>
                            </td>
                            <td class="text-center">
                                <a type="button" class="btn btn-xs yellow " href="<?= URL::to(['configuration/shipping/edit', 'id' => $shipconf['id']]) ?>">Update</a>
                                <button type="button" class="btn btn-xs red" data-toggle="confirmation"
                                        data-original-title="Are you sure?"
                                        href="<?= URL::to(['configuration/shipping/delete', 'id' => $shipconf['id']]) ?>">Delete
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
