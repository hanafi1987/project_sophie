<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ProductAsset extends AssetBundle
{
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';
    public $sourcePath = '@bower/hermo/';
//    public $css = [
//        'global/plugins/font-awesome/css/font-awesome.min.css',
//        'global/plugins/simple-line-icons/simple-line-icons.min.css',
//        'global/plugins/bootstrap/css/bootstrap.min.css',
//        'global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
//        'global/plugins/bootstrap-daterangepicker/daterangepicker.min.css',
//        'global/plugins/morris/morris.css',
//        'global/plugins/fullcalendar/fullcalendar.min.css',
//        'global/plugins/jqvmap/jqvmap/jqvmap.css',
//        'global/plugins/datatables/datatables.min.css',
//        'global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
//        'global/plugins/dropzone/dropzone.min.css',
//        'global/plugins/dropzone/basic.min.css',
//        'global/plugins/fancybox/source/jquery.fancybox.css',
//        'global/plugins/fileinput/css/fileinput.min.css',
//        'global/plugins/bootstrap-fileinput/bootstrap-fileinput.css',
//        'global/css/lightbox.min.css',
//        'global/css/components-md.min.css',
//        'global/css/plugins-md.min.css',
//        'layouts/layout/css/layout.min.css',
//        'layouts/layout/css/themes/default.min.css',
//        'layouts/layout/css/custom.min.css',
//
//    ];
//    public $js = [
//        'global/plugins/jquery.min.js',
//        'global/plugins/bootstrap/js/bootstrap.min.js',
//        'global/plugins/js.cookie.min.js',
//        'global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
//        'global/plugins/jquery.blockui.min.js',
//        'global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
//        'global/plugins/moment.min.js',
//        'global/plugins/bootstrap-daterangepicker/daterangepicker.min.js',
//        'global/plugins/morris/morris.min.js',
//        'global/plugins/morris/raphael-min.js',
//        'global/plugins/dropzone/dropzone.min.js',
//        'global/plugins/fancybox/source/jquery.fancybox.pack.js',
//        'global/plugins/bootstrap-fileinput/bootstrap-fileinput.js',
//        'global/plugins/fileinput/js/fileinput.min.js',
//        'global/plugins/tinymce/tinymce.min.js',
//        'global/scripts/datatable.js',
//        'global/plugins/datatables/datatables.min.js',
//        'global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js',
//        'global/scripts/hermo.js',
//        'apps/scripts/customs.js',
//    ];
    public $css = [
        'apps/css/apps-products.css'

    ];
    public $js = [
        'apps/scripts/products.js',
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );


}
