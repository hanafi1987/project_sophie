(function (window, document, $, angular) {
    'use strict';
    var apps = angular.module('sophie.apps', []);

    apps.service('homeService', function ($http) {
        this.banners = function () {
            return $http.get("/api/banners/all");
        }

        this.products = function () {
            return $http.get("/api/products/all");
        }
        this.getPercentage = function (unit_price, discount) {
            var decdis = parseFloat(1 - ((unit_price - discount) / unit_price));

            return Math.round(decdis * 100);
        }

    })

    apps.service('shoppingService', function ($http) {

        this.addCart = function (product_id, secret) {
            return $http.post("/api/shopping", {product_id: product_id, secret: secret});
        }
        this.getCartQtty = function (secret) {
            return $http.get("/api/shopping", {params: {param: 'qtty', secret: secret}});
        }
        this.getCart = function (secret) {
            return $http.get("/api/shopping", {params: {param: 'carts', secret: secret}});
        }
        this.getCountryShipping = function () {
            return $http.get("/api/shopping", {params: {param: 'countries'}});
        }
        this.promocode = function (promocode) {
            return $http.get("/api/promocode", {params: {promocode: promocode}});
        }
        this.removeItemFromCart = function (product_id, secret) {
            return $http.delete("/api/shopping/" + product_id, {params: {secret: secret}});
        }a
        this.confirmPurchase = function (carts, total, ordertotal, shipfee, discounts, promotioncode, secretkey, country) {
            return $http.post("/api/checkout", {
                carts: carts,
                total: total,
                ordertotal: ordertotal,
                shipfee: shipfee,
                discounts: discounts,
                promotioncode: promotioncode,
                secretkey: secretkey,
                country: country
            });
        }
    })


    apps.service('actionService', function ($http) {
        this.sorting = function (sorted_value) {
            return $http.get("/api/products/all", {
                params: {sorted_value: sorted_value}
            });
        }
        this.randomString = function () {

            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for (var i = 0; i < 32; i++)
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;

        }
    })

    apps.service('orderService', function ($http) {
        this.getOrder = function (order_id, secret_key)
        {
            return $http.get('/api/checkout/' + order_id, {params: {secret_key: secret_key}});
        }

    })
    apps.directive("slider", function ($timeout) {
        return {
            scope: true,
            restrict: 'A',
            link: function (scope, element, attr) {
                $timeout(function () {
                    var slider = new IdealImageSlider.Slider({
                        selector: '#slider',
                        interval: 3900,
                        effect: 'fade',
                        keyboardNav: true
                    });
                    slider.start();
                });

            }
        }

    });
    apps.directive("selectpick", function ($timeout) {
        return {
            scope: true,
            restrict: 'A',
            link: function (scope, element, attr) {
                $timeout(function () {
                    $('.selectpicker').selectpicker('val', ['Mustard', 'Relish']);
                });
            }
        }

    });


})(window, document, jQuery, angular);