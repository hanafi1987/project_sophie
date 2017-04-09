<?php
use yii\helpers\Url;

$this->title = 'All Supplier | Sophie Malaysia';
?>
<h1 class="page-title"> All Supplier
    <small>Manage Site Supplier Here</small>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?=Url::to('/')?>">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Supplier</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>All Supplier</span>
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
                                <a id="add_new" class="btn sbold green" href="/suppliers/add"> Add New
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

                        <th> Name</th>
                        <th class="text-center" width="8%"> Logo</th>
                        <th class="text-center" width="8%"> Updated At</th>
                        <th class="text-center" width="12%"> Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model as $brand) { ?>
                        <tr class="odd gradeX">
                            <td><?= $brand['name'] ?></td>
                            <td class="text-center"><div class="thumb">
                                <div id="thumbnail-img"><a href="<?= $brand['img_path'] ?>"
                                                           data-lightbox="image-1"><img id="thumbnail"
                                                                                        src="<?= $brand['img_path'] ?>"></div></a>
                                </div>
                            </td>
                            <td class="text-center"><?=date('d/m/Y h:i A', strtotime($brand['updated_at']))?>
                            </td>
                            <td class="text-center">
                                <a type="button" class="btn btn-xs yellow " href="<?= URL::to(['brands/edit', 'id' => $brand['id']]) ?>">Update</a>
                                <button type="button" class="btn btn-xs red" data-toggle="confirmation"
                                        data-original-title="Are you sure?"
                                        href="<?= URL::to(['brands/delete', 'id' => $brand['id']]) ?>">Delete
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
