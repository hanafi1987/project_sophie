
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false"
            data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item<?php echo Yii::$app->controller->sidebar=="dashboard" ? "  start active open": "";?>">
                <a href="/">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <li class="nav-item<?php echo Yii::$app->controller->sidebar=="order" ? "  start active open": "";?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-cup"></i>
                    <span class="title">Order</span>
                    <?php echo Yii::$app->controller->sidebar=="order" ? "  <span class=\"selected\"></span>": "";?>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item<?php echo Yii::$app->controller->sidebar=="products" ? "  start active open": "";?>">
                <a href="javascript:;" class="nav-link new-toggle">
                    <i class="icon-basket"></i>
                    <span class="title">Products</span>
                    <?php echo Yii::$app->controller->sidebar=="products" ? "  <span class=\"selected\"></span>": "";?>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/products/add" class="nav-link ">
                            <i class="fa fa-plus"></i>
                            <span class="title">Add Product</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="/products" class="nav-link ">
                            <i class="fa fa-list-ol"></i>
                            <span class="title">All Products</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="/products/categories" class="nav-link ">
                            <i class="fa fa-list-ol"></i>
                            <span class="title">Categories</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item<?php echo Yii::$app->controller->sidebar=="supplier" ? "  start active open": "";?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Supplier</span>
                    <?php echo Yii::$app->controller->sidebar=="supplier" ? "  <span class=\"selected\"></span>": "";?>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/supplier/add" class="nav-link ">
                            <i class="fa fa-plus"></i>
                            <span class="title">Add Supplier</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="/supplier" class="nav-link ">
                            <i class="fa fa-list-ol"></i>
                            <span class="title">All Supplier</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item<?php echo Yii::$app->controller->sidebar=="banners" ? "  start active open": "";?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Banners</span>
                    <?php echo Yii::$app->controller->sidebar=="banners" ? "  <span class=\"selected\"></span>": "";?>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/banners/add" class="nav-link ">
                            <i class="fa fa-plus"></i>
                            <span class="title">Add Banner</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="/banners" class="nav-link ">
                            <i class="fa fa-list-ol"></i>
                            <span class="title">All Banners</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item<?php echo Yii::$app->controller->sidebar=="users" ? "  start active open": "";?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">User</span>
                    <?php echo Yii::$app->controller->sidebar=="users" ? "  <span class=\"selected\"></span>": "";?>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/users/add" class="nav-link ">
                            <i class="fa fa-plus"></i>
                            <span class="title">Add User</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="/users" class="nav-link ">
                            <i class="fa fa-list-ol"></i>
                            <span class="title">All Users</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item<?php echo Yii::$app->controller->sidebar=="configuration" ? "  start active open": "";?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-social-dribbble"></i>
                    <span class="title">Configuration</span>
                    <?php echo Yii::$app->controller->sidebar=="configuration" ? "  <span class=\"selected\"></span>": "";?>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/configuration/shipping" class="nav-link ">
                            <i class="icon-info"></i>
                            <span class="title">Shipping</span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</div>