<?php
use backend\models\Brands;
use backend\models\Img;
use backend\models\SubCategories;
use yii\helpers\Url;
$this->title = 'Dashboard | Sophie Malaysia';
?>
<h1 class="page-title"> Welcome, <?php echo Yii::$app->user->identity->name; ?>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Dashboard</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">

        <div class="row">
            <div class="col-md-3">
                <div class="mt-widget-3">
                    <div class="mt-head bg-blue-hoki">
                        <div class="mt-head-icon">
                            <i class="icon-basket"></i>
                        </div>
                        <div class="mt-head-desc"> <?=$productCount?> Products</div>
                        <div class="mt-head-button">
                            <a href="/products/add" class="btn btn-circle btn-outline white btn-sm">Add</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mt-widget-3">
                    <div class="mt-head bg-red">
                        <div class="mt-head-icon">
                            <i class="icon-diamond"></i>
                        </div>
                        <div class="mt-head-desc"> <?=$supplierCount?> Supplier</div>
                        <div class="mt-head-button">
                            <a href="/supplier/add" class="btn btn-circle btn-outline white btn-sm">Add</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="mt-widget-3">
                    <div class="mt-head bg-green">
                        <div class="mt-head-icon">
                            <i class="icon-layers"></i>
                        </div>
                        <div class="mt-head-desc"> <?=$bannerCount?> Banners</div>
                        <div class="mt-head-button">
                            <a href="/banners/add" class="btn btn-circle btn-outline white btn-sm">Add</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="mt-widget-3">
                    <div class="mt-head bg-purple">
                        <div class="mt-head-icon">
                            <i class="icon-user"></i>
                        </div>
                        <div class="mt-head-desc"> <?=$promoCount?> Promo Code</div>
                        <div class="mt-head-button">
                            <a href="/promocode/add" class="btn btn-circle btn-outline white btn-sm">Add</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="portlet light portlet-fit ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-microphone font-dark hide"></i>
                            <span class="caption-subject bold font-dark uppercase"> Latest Product</span>
                            <span class="caption-helper">Latest 4 Products</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <?php
                            if($productCount>0) {
                                foreach ($productShowcase as $product) { ?>
                                    <div class="col-md-3">
                                        <div class="mt-widget-2">
                                            <div class="mt-head">
                                                <div class="mt-head-user">
                                                    <div class="mt-head-user-img">
                                                        <img src="<?= $product['img_path'] ?>"></div>
                                                </div>
                                            </div>
                                            <div class="mt-body">
                                                <h3 class="mt-body-title"> <?= $product['product_name'] ?> </h3>
                                                <p class="mt-body-description"> <?php $subcat = new SubCategories();
                                                    $cat = $subcat->getSubAndCat($product['subcategories']);
                                                    echo $cat['catname'] . ' > ' . $cat['subcatname']; ?> </p>
                                                <ul class="mt-body-stats">
                                                    <li class="font-green">
                                                        <i class="icon-emoticon-smile"></i> <?= $product['brand_name'] ?>
                                                    </li>
                                                    <li class="font-yellow">
                                                        <?= $product['sku_serial'] ?>
                                                    </li>
                                                    <li class="font-red">
                                                        <?= $product['quantity'] . ' item' ?>
                                                    </li>
                                                </ul>
                                                <div class="mt-body-actions">

                                                    <a type="button" class="btn btn-action-padding"
                                                       href="<?= URL::to(['products/edit', 'id' => $product['product_id']]) ?>">Update</a>
                                                    <a type="button" class="btn btn-action-padding red"
                                                       data-toggle="confirmation"
                                                       data-original-title="Are you sure?"
                                                       href="<?= URL::to('/products/delete?id=' . $product['product_id'] . '&r=dashboard') ?>">Delete
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }else if($productCount==0){
                                echo '<div class="col-lg-12 text-center"><h3>No Product Yet</h3><small>Add Product <a href="/products/add/">Here</small></small></div>';
                            }?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>