(function (window, document, $, angular) {
    'use strict';
    var ctrl = angular.module('sophie', ['sophie.apps', 'ngCookies']);

    ctrl.controller('mainctrl', function (homeService, shoppingService, actionService, $scope, $cookies) {

        if(!$cookies.get('_secret')){
            $cookies.put('_secret', actionService.randomString());
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

        shoppingService.getCartQtty().then(function (response) {
            $scope.cartnum = response.data;
        });


        $scope.purchase = function (product_id) {
            var count = shoppingService.addCart(product_id).then(function (response) {
                $scope.cartnum = response.data;

            });


        }
        $scope.sortingSelected = function (sorted_value) {
            var sorted_value = $scope.sorting;
            actionService.sorting(sorted_value).then(function (response) {
                $scope.products = [];
                $scope.products = response.data;

            });
        }
        $scope.shoppingCart = function () {
            console.log('jaja');
            return $window.location.href = '/mall/shoppingcart';
        }
    });

})(window, document, jQuery, angular);