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
        this.addCart = function (product_id) {
            return $http.post("/api/shopping", {product_id: product_id});
        }
        this.getCartQtty = function () {
            return $http.get("/api/shopping", {params: {param: 'qtty'}});
        }
        this.shoppingcart = function(){
            return $http.get("/api/shopping", {params: {param: 'carts'}});
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


})(window, document, jQuery, angular);