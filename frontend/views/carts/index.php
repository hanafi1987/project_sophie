<?php
$this->title = "Shopping Carts | Sophie Malaysia";
?>
<section class="page-title text-center">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">Shopping Cart - Checkout</h1>
            </div>
        </div>
    </div>
</section>
<section class="section-wrap shopping-cart pt-0" ng-controller="shoppingcartctrl">
    <div class="container relative">
        <div class="row">

            <div class="col-md-12">
                <div class="table-wrap mb-30">
                    <table class="shop_table cart table">
                        <thead>
                        <tr>
                            <th class="product-name" colspan="2">Product</th>
                            <th class="product-price text-center">Price</th>
                            <th class="product-quantity text-center">Quantity</th>
                            <th class="product-subtotal text-center">Total</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-if="carts !== undefined || carts.length != 0" class="cart_item"
                            ng-repeat="cart in carts">
                            <td class="product-thumbnail">
                                <a href="#">
                                    <img ng-src="/{{cart.img_path}}" alt="">
                                </a>

                            </td>
                            <td class="product-name">
                                <a href="/mall/{{ cart.product_id }}">{{(cart.product_name).substring(0, 50)}}</a>
                                <div class="product-brand">Supplier: {{cart.brand_name}}</div>
                            </td>
                            <td class="product-price text-center">
                                <small class="wrapper"><del>RM{{cart.unit_price}}</del></small>
                                <span class="amount">RM{{cart.sales_price}}</span>
                            </td>
                            <td class="product-quantity text-center">
                                {{cart.count_cart}}
                            </td>
                            <td class="product-subtotal text-center"
                                ng-init="itemTotal = cart.sum_salesprice * cart.count_cart; controller.Total = controller.Total + itemTotal">

                                <span class="amount">RM{{cart.sum_salesprice}}</span>
                            </td>
                            <td class="product-remove">
                                <a href="#" class="remove" title="Remove this item"
                                   ng-click="removeItem(cart.product_id)">
                                    <i class="icon icon-close"></i>
                                </a>
                            </td>
                        </tr>
                        <tr ng-if="carts === undefined || carts.length == 0" class="cart_item">
                            <td colspan="6" class="text-center empty-cart"><i class="fa fa-shopping-cart"></i> The Cart
                                is Empty
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row mb-50" ng-if="carts !== undefined || carts.length != 0">
                    <div class="col-md-5 col-sm-12">
                        <div class="coupon">
                            <input type="text" name="coupon_code" id="coupon_code" class="input-text form-control"
                                   ng-model="promocode" placeholder="Promotion code">
                            <input type="button" name="apply_coupon" class="btn btn-md dark"
                                   ng-click="enterPromo(promocode)" value="Apply">
                            <div class="invalidparam mb-15" ng-if="invalidparam!==false" ng-bind="invalidparam"></div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="shipping-calculator-form pull-right col-lg-12 col-md-12 nopadding">

                            <h2 class="heading relative heading-small uppercase mb-10 col-lg-8 col-md-8">Calculate
                                Shipping</h2>
                            <div class="col-lg-4 col-md-4 nopadding">
                                <select ng-init="selection.countryselected='1'" name="calc_shipping_country"
                                        class="country_to_state form-control" ng-model="selection.countryselected"
                                        ng-change="countryShip()">
                                    <option ng-repeat="country in countries" value="{{country.shipconf_id}}">{{
                                        country.country_name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row" ng-if="carts !== undefined || carts.length != 0">
            <div class="col-md-6">
                <div class="carts_payment">
                    <h2 class="heading relative heading-small uppercase mb-10">Choose Payment Method</h2>
                    <ul class="payment-list">
                        <li class="pointer" ng-click="checkPayment(1)">
                            <div><input type="radio" ng-value="1"  ng-model="payment_method"> <i
                                        class="icon icon-wallet"></i> <span>Cash On Delivery</span></div>
                        </li>
                        <li class="pointer" ng-click="checkPayment(2)">
                            <div><input type="radio" ng-value="2" ng-model="payment_method"> <i
                                        class="icon icon-credit-card"></i>
                                <span>Credit or Debit Card</span></div>
                        </li>
                        <li class="pointer" ng-click="checkPayment(3)">
                            <div><input type="radio" ng-value="3"  ng-model="payment_method"> <i
                                        class="icon icon-globe"></i> Online
                                <span>Banking</span></div>
                        </li>
                    </ul>
                    <div class="confirm-purchase">
                        <button type="button" ng-click="confirmPurchase()" class="btn btn-md purple"><span ng-bind-html="confirmtext"></span>
                        </button>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
                <div class="cart_totals">
                    <h2 class="heading relative heading-small uppercase mb-30">Cart Totals</h2>

                    <table class="table shop_table">
                        <tbody>
                        <tr class="cart-subtotal">
                            <th>Cart Subtotal</th>
                            <td>
                                <span class="amount">RM{{ (total).toFixed(2) }}</span>
                            </td>
                        </tr>
                        <tr class="order-discount">
                            <th><strong>Discount (-)</strong></th>
                            <td>
                                <span class="amount" ng-bind="discountsText"></span>
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
            </div>

        </div>


    </div>
</section>