<?php
$this->title = "Order Summary | Sophie Malaysia";
?>
<section class="page-title text-center">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">Shopping Cart - Order Summary</h1>
            </div>
        </div>
    </div>
</section>
<section class="section-wrap shopping-cart pt-0" ng-controller="orderctrl">
    <input type="hidden" ng-model="orderid" ng-init="orderid=<?= $order_id ?>" name="orderid">
    <div class="container relative">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center order-success"><img src="/images/enjoy.png" height="80px"> <span>THANK YOU FOR YOUR PURCHASE! YOU'RE ROCK!</span></div>
        </div>
        <div class="row">

            <div class="col-md-8">
                <div class="table-wrap">
                    <table class="shop_table cart table">
                        <thead>
                        <tr>
                            <th class="product-name" colspan="2">Product</th>
                            <th class="product-price text-center">Price</th>
                            <th class="product-quantity text-center">Quantity</th>
                            <th class="product-subtotal text-center">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-if="product !== undefined || product.length != 0" class="product_list"
                            ng-repeat="product in products">
                            <td class="product-thumbnail">
                                <a href="#">
                                    <img ng-src="/{{product.img_path}}" alt="">
                                </a>
                            </td>
                            <td class="product-name">
                                <a href="/mall/{{ product.product_id }}">{{(product.product_name).substring(0, 50)}}</a>
                                <div class="product-brand">Supplier: {{product.brand_name}}</div>
                            </td>
                            <td class="product-price text-center">
                                <small class="wrapper"><del>RM{{cart.unit_price}}</del></small>
                                <span class="amount">RM{{product.sales_price}}</span>
                            </td>
                            <td class="product-quantity text-center">
                                {{product.count_cart}}
                            </td>
                            <td class="product-subtotal text-center"
                                ng-init="itemTotal = cart.sum_salesprice * cart.count_cart; controller.Total = controller.Total + itemTotal">
                                <span class="amount">RM{{product.sum_salesprice}}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="col-md-4">
                <div class="payment_summary">
                    <h2 class="heading relative heading-small uppercase">Payment Summary</h2>

                    <table class="table payment_table">
                        <tbody>
                        <tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td>
                                <span class="amount">RM{{ (total).toFixed(2) }}</span>
                            </td>
                        </tr>
                        <tr class="order-discount">
                            <th><strong>Discount (-)</strong><span ng-bind="promotioncodeText"
                                                                   class="normal-text"></span></th>
                            <td>
                                <span ng-bind="discountsText" class="discountamount"></span>
                            </td>
                        </tr>
                        <tr class="shipping">
                            <th>Shipping (+)</th>
                            <td>
                                <span ng-bind="shipfeeText" class="shipfree"></span>
                            </td>
                        </tr>
                        <tr class="order-total">
                            <th><strong>Order Total</strong></th>
                            <td>
                                <strong><span class="amount">RM{{ (ordertotal).toFixed(2) }}</span></strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="shipping_country">
                    <table class="table shipcountry_table">
                        <tbody>
                        <tr>
                            <th>Shipping Country</th>
                            <td>
                                <span class="method" ng-bind="shipcountry"></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</section>