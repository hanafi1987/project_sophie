(function (window, document, $, angular) {
    'use strict';
    var ctrl = angular.module('sophie', ['sophie.apps', 'ngCookies', 'ngSanitize']);

    ctrl.controller('mainctrl', function (homeService, shoppingService, actionService, $scope, $cookies) {

        if (!$cookies.get('_secret')) {
            var expireDate = new Date();
            expireDate.setDate(expireDate.getDate() + 1);
            $cookies.put('_secret', actionService.randomString(), {'expires': expireDate});
        }
        var secret = $cookies.get('_secret');

        homeService.banners().then(function (response) {
            $scope.banners = [];
            $scope.banners = response.data;
        });
        homeService.products().then(function (response) {
            $scope.products = [];
            $scope.products = response.data;
        });

        $scope.discounted = function (unit_price, discount) {
            return homeService.getPercentage(unit_price, discount) + '%';
        }

        shoppingService.getCartQtty(secret).then(function (response) {
            $scope.cartnum = response.data;
        });


        $scope.purchase = function (product_id) {
            shoppingService.addCart(product_id, secret).then(function (response) {
                var expDate = new Date();
                expDate.setDate(expDate.getDate() + 1);
                $cookies.put('_secret', secret, {'expires': expDate});
                $scope.cartnum = response.data;

            });


        }
        $scope.sortingSelected = function () {
            var sorted_value = $scope.sorting;

            actionService.sorting(sorted_value).then(function (response) {
                $scope.products = [];
                $scope.products = response.data;

            });
        }
    });

    ctrl.controller('shoppingcartctrl', function (shoppingService, $scope, $cookies, $window) {

        $scope.carts = [];
        $scope.countries = [];
        $scope.shippingfees = [];
        $scope.payment_method = 1;
        $scope.confirmtext = "Confirm Purchase";
        $scope.promotioncode;
        $scope.invalidparam == false;
        $scope.selection = {};

        if (!$cookies.get('_secret')) {
            var expireDate = new Date();
            expireDate.setDate(expireDate.getDate() + 1);
            $cookies.put('_secret', actionService.randomString(), {'expires': expireDate});
        }
        var secret = $cookies.get('_secret');
        shoppingService.getCart(secret).then(function (response) {
            $scope.carts = response.data;
            var total = 0.00;
            var count = 0;
            for (var i = 0; i < $scope.carts.length; i++) {
                var cart = $scope.carts[i];
                total += (cart.sales_price * cart.count_cart);
                count += parseInt(cart.count_cart);
            }
            $scope.totalcount = count;
            $scope.total = total;
            shoppingService.getCountryShipping().then(function (response) {
                $scope.countries = response.data;
                $scope.shippingfees = searchbyCountriesid(1, $scope.countries);
                $scope.country = $scope.shippingfees.countries_id;
                shippingfees($scope.shippingfees.min_purchase, $scope.shippingfees.min_quantity, $scope.shippingfees.normal_fees, $scope.total, $scope.totalcount);
            });
        });
        $scope.countryShip = function () {
            var shoppingcountry = $scope.selection.countryselected;

            $scope.shippingfees = searchbyCountriesid(shoppingcountry, $scope.countries);
            shippingfees($scope.shippingfees.min_purchase, $scope.shippingfees.min_quantity, $scope.shippingfees.normal_fees, $scope.total, $scope.totalcount);

        }

        $scope.enterPromo = function (promocode) {
            shoppingService.promocode(promocode).then(function (response) {
                $scope.invalidparam = null;
                var shipfee = 0.00;
                if ($scope.shipfee !== undefined) {
                    shipfee = $scope.shipfee;
                }
                if (response.data.code == 0) {
                    var params = JSON.parse(response.data.params);
                    if (params.min_type == 8 && $scope.total > params.min) {
                        $scope.promotioncode = promocode;
                        discTypeDiscount(params.disc_type, params.disc);
                    } else if (params.min_type == 9 && $scope.totalcount > params.min) {
                        $scope.promotioncode = promocode;
                        discTypeDiscount(params.disc_type, params.disc);
                    } else {
                        $scope.discountsText = null;
                        $scope.ordertotal = $scope.total + parseFloat(shipfee);
                        $scope.invalidparam = "Does not meet the min requirement";
                    }
                } else if (response.data.code == 1) {
                    $scope.discountsText = null;
                    $scope.ordertotal = $scope.total + parseFloat(shipfee);
                    $scope.invalidparam = "Promotion code is invalid";
                }
            })
        }
        $scope.removeItem = function (product_id) {
            var x = confirm("Are you sure to remove this product from the list?");
            if (x == true) {
                var index = -1;
                var empArr = eval($scope.carts);
                var shipfee = 0.00;
                var discounts = 0.00;
                if ($scope.shipfee !== undefined) {
                    shipfee = $scope.shipfee;
                }
                if ($scope.discounts !== undefined) {
                    discounts = $scope.discounts;
                }
                for (var i = 0; i < empArr.length; i++) {
                    if (empArr[i].product_id === product_id) {
                        index = i;
                        $scope.total -= (parseFloat(empArr[i].sales_price) * parseFloat(empArr[i].count_cart));
                        break;
                    }
                }
                if (index === -1) {
                    alert("Something gone wrong");
                } else {
                    shoppingService.removeItemFromCart(product_id, secret).then(function (response) {
                        $scope.carts = response.data;
                    });
                }

                $scope.ordertotal = $scope.total - parseFloat(discounts) + parseFloat(shipfee);
                $scope.carts.splice(index, 1);
            }
        };

        $scope.confirmPurchase = function () {
            $scope.confirmtext = '<div class="cssload-jumping"><span></span><span></span><span></span><span></span><span></span> </div>';
            var expDate = new Date();
            expDate.setDate(expDate.getDate() + 1);
            $cookies.put('_secret', secret, {'expires': expDate});
            shoppingService.confirmPurchase($scope.carts, $scope.total, $scope.ordertotal, $scope.shipfee, $scope.discounts, $scope.promotioncode, secret, $scope.country).then(function (response) {
                $window.location.href = "/mall/order/" + response.data;
            })
        }
        $scope.checkPayment = function (method_value) {
            console.log(method_value);
            $scope.payment_method = method_value;
        }

        function discTypeDiscount(disc_type, disc) {
            var discounts;
            var shipfee = 0.00;
            if ($scope.shipfee !== undefined) {
                shipfee = $scope.shipfee;
            }
            if (disc_type == 10) {
                discounts = parseFloat($scope.total) * (parseFloat(disc).toFixed(2) / 100);
                $scope.ordertotal = $scope.total - parseFloat(discounts) + parseFloat(shipfee);
                $scope.discounts = parseFloat(discounts).toFixed(2);
                $scope.discountsText = "-RM" + parseFloat(discounts).toFixed(2);
            } else if (disc_type == 11) {
                $scope.discounts = parseFloat(disc).toFixed(2);
                $scope.discountsText = "-RM" + parseFloat(disc).toFixed(2);
                discounts = disc;
                $scope.ordertotal = $scope.total - parseFloat(discounts) + parseFloat(shipfee);
            }
        }

        function searchbyCountriesid(nameKey, myArray) {
            for (var i = 0; i < myArray.length; i++) {
                if (myArray[i].shipconf_id == nameKey) {
                    $scope.country = myArray[i].countries_id;
                    return myArray[i];
                }
            }
        }

        function shippingfees(min_purchase, min_quantity, normal_fees, total, totalcount) {
            var totalAfterShipFee;
            var discounts = 0.00;
            if ($scope.discounts !== undefined) {
                discounts = $scope.discounts;
            }
            if ((min_purchase != '' || min_purchase != null) && (min_quantity != '' || min_quantity != null)) {
                if (total > $scope.shippingfees.min_purchase && totalcount > min_quantity) {
                    $scope.shipfeeText = "Free Shipping";
                    $scope.ordertotal = total - discounts;
                } else {
                    totalAfterShipFee = parseFloat(total) + parseFloat(normal_fees);
                    $scope.shipfee = parseFloat(normal_fees).toFixed(2);
                    $scope.shipfeeText = "RM" + parseFloat(normal_fees).toFixed(2);
                    $scope.ordertotal = totalAfterShipFee - discounts;
                }
            } else if ((min_purchase != '' || min_purchase != null) && (min_quantity == '' || min_quantity == null)) {
                if (totalcount > $scope.min_quantity) {
                    $scope.shipfeeText = "Free Shipping";
                    $scope.ordertotal = total - discounts;
                } else {
                    totalAfterShipFee = parseFloat(total) + parseFloat(normal_fees);
                    $scope.shipfee = parseFloat(normal_fees).toFixed(2);
                    $scope.shipfeeText = "RM" + parseFloat(normal_fees).toFixed(2);
                    $scope.ordertotal = totalAfterShipFee - discounts;
                }
            } else {
                $scope.ordertotal = total;
            }
        }
    });

    ctrl.controller('orderctrl', function (orderService, $scope, $cookies, $timeout) {
        if (!$cookies.get('_secret')) {
            var expireDate = new Date();
            expireDate.setDate(expireDate.getDate() + 1);
            $cookies.put('_secret', actionService.randomString(), {'expires': expireDate});
        }
        var secret = $cookies.get('_secret');
        $timeout(function () {
            orderService.getOrder($scope.orderid, secret).then(function (response) {
                var data = response.data;
                $scope.products = JSON.parse(data.shoppingcart);
                $scope.total = parseFloat(data.total);
                $scope.promotioncodeText = (data.promo_code != null ? ' - '+data.promo_code : '');
                $scope.ordertotal = (data.order_total != null ? parseFloat(data.order_total) : 0.00);
                $scope.discountsText = (data.discounts != null ? 'RM'+parseFloat(data.discounts).toFixed(2) : '');
                $scope.shipfeeText = (data.shipping_fee != null ? 'RM'+parseFloat(data.shipping_fee).toFixed(2) : 'Free Shipping');
                $scope.shipcountry = (data.name != null ? data.name : '');

            })
        })

    });


})(window, document, jQuery, angular);