<?php
use yii\helpers\Url;
use backend\models\Img;
use backend\models\SubCategories;

$this->title = 'All Products | Sophie Malaysia';
?>
<h1 class="page-title"> All Products
    <small>Manage Site Product Here</small>
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
            <span>All Products</span>
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
                                <a id="add_new" class="btn sbold green" href="/products/add"> Add New
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

                        <th> Product Name</th>
                        <th class="text-center" width="10%"> SKU Serial / Quantity</th>
                        <th class="text-center" width="8%"> Featured Image</th>
                        <th class="text-center" width="8%"> Brand</th>
                        <th class="text-center" width="13%"> Categories > Sub Categories</th>
                        <th class="text-center" width="5%">Status</th>
                        <th class="text-center" width="8%"> Updated At</th>
                        <th class="text-center" width="12%"> Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model as $product) {

                        ?>
                        <tr class="odd gradeX">
                            <td><?= $product['product_name'] ?></td>
                            <td class="text-center"><?= $product['sku_serial'].' / '.$product['quantity'].' item' ?></td>
                            <td class="text-center">
                                <div class="thumb">
                                    <div id="thumbnail-img"><a href="<?= $product['img_path'] ?>"
                                                               data-lightbox="image-1"><img id="thumbnail"
                                                                                            src="<?= $product['img_path'] ?>">
                                    </div>
                                    </a>
                                </div>
                            </td>
                            <td><?php $img = new Img();
                                $brand = $img->imgByBaseId($product['brand_id']); ?>
                                <div class="thumb">
                                    <div id="thumbnail-img"><img id="thumbnail"
                                                                 src="<?= $brand['img_path'] ?>"></div>
                                </div>
                            </td>
                            <td class="text-center"><?php $subcat = new SubCategories(); $cat = $subcat->getSubAndCat($product['subcategories']); echo $cat['catname'].' > '.$cat['subcatname']; ?></td>
                            <td class="text-center">
                                <?php if ($product['status'] == 0) {
                                    echo '<span class="label label-sm label-success"> ON </span>';
                                } else {
                                    echo '<span class="label label-sm label-warning"> OFF</span>';
                                } ?>
                            </td>
                            <td class="text-center"><?=date('d/m/Y h:i A', strtotime($product['updated_at']))?>
                            </td>
                            <td class="text-center">
                                <a type="button" class="btn btn-xs yellow " href="<?= URL::to(['products/edit', 'id' => $product['product_id']]) ?>">Update</a>
                                <a type="button" class="btn btn-xs red" data-toggle="confirmation"
                                        data-original-title="Are you sure?"
                                        href="<?= URL::to(['products/delete', 'id' => $product['product_id']]) ?>">Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
