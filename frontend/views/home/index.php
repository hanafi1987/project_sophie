<?php
$this->title = "Welcome | Sophie Malaysia";
?>
<section class="section-wrap product-listing pb-40" ng-controller="mainctrl">
    <div class="row">
        <div id="slider">
            <a ng-repeat="banner in banners" href="{{ banner.url }}" slider><img ng-src="/{{ banner.img_path }}" alt=""></a>
        </div>
    </div>
    <div class="row action-bar">
        <div class="pull-right col-lg-6 col-md-8 col-sm-12 col-xs-12 nopadding">
            <div class="cart-block col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
                <i class="fa fa-shopping-cart"></i>
                <a href="/mall/shoppingcart" ng-if="cartnum!=0"><div class="carts" ng-bind="cartnum"></div></a>
            </div>
            <div class="sort-block col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding">
                <label class="col-lg-4 col-md-4 col-sm-6 col-xs-6 text-right">Sort as </label>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding text-right">
                    <select ng-init="sorting='def'" class="form-control" ng-model="sorting" ng-change="sortingSelected()">
                        <option value="def">Default</option>
                        <option value="sales_price.asc">Selling Price (Low > High)</option>
                        <option value="sales_price.desc">Selling Price (High > Low)</option>
                        <option value="discount_percentage.asc">Discount (Low > High)</option>
                        <option value="discount_percentage.desc">Discount (High >Low)</option>
                        <option value="name.asc">Name (A-Z)</option>
                        <option value="name.desc">Name (Z-A)</option>
                    </select>
                </div>

            </div>


        </div>
    </div>
    <div class="row row-10" ng-model="productlist" id="productlist">
        <div class="col-lg-3 col-md-12 col-xs-12 product-block" ng-repeat="product in products">
            <div class="product-item">
                <div class="product-img">
                    <a href="/mall/{{ product.product_id }}">
                        <div ng-if="product.discount!==null" class="product-discount">{{
                            discounted(product.unit_price,product.discount) }}
                        </div>
                        <div class="product-preload">
                            <img ng-src="/{{ product.img_path }}" alt="" class="back-img">
                        </div>
                    </a>

                </div>
                <div class="product-brand">
                    <span>{{ product.brand_name }}</span>
                </div>
                <div class="product-details">
                    <h3>
                        <a class="product-title" href="/mall/{{ product.product_id }}">{{
                            (product.product_name).substring(0, 50) }}</a>
                    </h3>
                    <span class="price">
                  <del>
                    <span>RM{{ product.unit_price }}</span>
                  </del>
                  <div>
                    <span class="amount">RM{{ (product.unit_price - product.discount).toFixed(2) }}</span>
                  </div>
                </span>
                </div>
                <div class="product-action">
                    <button type="button" class="btn btn-block dark text-center"
                            ng-click="purchase(product.product_id)">Buy Now
                    </button>
                </div>
            </div>
        </div>

    </div>
</section>