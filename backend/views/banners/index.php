<?php
use yii\helpers\Url;

$this->title = 'All Banners | Sophie Malaysia';
?>
<h1 class="page-title"> All Banners
    <small>Manage Site Banner Here</small>
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
            <span>All Banners</span>
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
                                <a id="add_new" class="btn sbold green" href="/banners/add"> Add New
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

                        <th width="37%"> Title</th>
                        <th class="text-center" width="30%"> URL</th>
                        <th class="text-center" width="5%"> Status</th>
                        <th class="text-center" width="8%"> Images</th>
                        <th class="text-center" width="8%"> Updated At</th>
                        <th class="text-center" width="12%"> Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model as $banner) { ?>
                        <tr class="odd gradeX">
                            <td><?= $banner['name'] ?></td>
                            <td>
                                <?php if ($banner['url'] != '') { ?>
                                    <a href="<?= $banner['url'] ?>" target="_blank"><?= $banner['url'] ?></a>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <?php if ($banner['status'] == 0) {
                                    echo '<span class="label label-sm label-success"> ON </span>';
                                } else {
                                    echo '<span class="label label-sm label-warning"> OFF</span>';
                                } ?>
                            </td>
                            <td class="text-center"><div class="thumb">
                                <div id="thumbnail-img"><a href="<?= $banner['img_path'] ?>"
                                                           data-lightbox="image-1"><img id="thumbnail"
                                                                                        src="<?= $banner['img_path'] ?>"></div></a>
                                </div>
                            </td>
                            <td class="text-center"><?=date('d/m/Y h:i A', strtotime($banner['updated_at']))?>
                            </td>
                            <td class="text-center">
                                <a type="button" class="btn btn-xs yellow " href="<?= URL::to(['banners/edit', 'id' => $banner['id']]) ?>">Update</a>
                                <button type="button" class="btn btn-xs red" data-toggle="confirmation"
                                        data-original-title="Are you sure?"
                                        href="<?= URL::to(['banners/delete', 'id' => $banner['id']]) ?>">Delete
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
