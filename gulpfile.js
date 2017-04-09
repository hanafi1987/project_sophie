var gulp = require('gulp');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var minifycss = require('gulp-css');

gulp.task('css', function () {
    gulp.src(
        // './frontend/web/assets/75257c76/css/*.css'
        ['./frontend/web/assets/8c090f42/css/bootstrap.min.css',
            './frontend/web/assets/8c090f42/css/bootstrap-theme.css',
            './frontend/web/assets/8c090f42/css/fonts.css',
            './frontend/web/assets/8c090f42/css/ideal-image-slider.css',
            './frontend/web/assets/8c090f42/css/components-md.css',
            './frontend/web/assets/8c090f42/css/components-rounded.css',
            './frontend/web/assets/8c090f42/css/styles.css',
        ]
    ).pipe(concat('app.css'))
        .pipe(minifycss())
        .pipe(gulp.dest('./frontend/web/assets/8c090f42/css'))
});
gulp.task('scripts', function () {
    gulp.src([
        './frontend/web/assets/8c090f42/js/jquery.min.js',
        './frontend/web/assets/8c090f42/js/angular.min.js',
        './frontend/web/assets/8c090f42/js/angular-cookies.min.js',
        './frontend/web/assets/8c090f42/js/angular-sanitize.js',
        './frontend/web/assets/8c090f42/js/bootstrap.min.js',
        './frontend/web/assets/8c090f42/js/slider.min.js'


    ]).pipe(concat('libs.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./frontend/web/assets/8c090f42/js'))

})
//
// gulp.task('css', function () {
//     gulp.src(
//         // './frontend/web/assets/75257c76/css/*.css'
//         [
//             './backend/web/assets/e3cb9b53/global/plugins/font-awesome/css/font-awesome.css',
//             './backend/web/assets/e3cb9b53/global/plugins/simple-line-icons/simple-line-icons.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/bootstrap/css/bootstrap.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/morris/morris.css',
//             './backend/web/assets/e3cb9b53/global/plugins/fullcalendar/fullcalendar.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/jqvmap/jqvmap/jqvmap.css',
//             './backend/web/assets/e3cb9b53/global/plugins/datatables/datatables.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
//             './backend/web/assets/e3cb9b53/global/plugins/dropzone/dropzone.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/dropzone/basic.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/fancybox/source/jquery.fancybox.css',
//             './backend/web/assets/e3cb9b53/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css',
//             './backend/web/assets/e3cb9b53/global/css/lightbox.min.css',
//             './backend/web/assets/e3cb9b53/global/css/components-md.min.css',
//             './backend/web/assets/e3cb9b53/global/css/plugins-md.min.css',
//             './backend/web/assets/e3cb9b53/layouts/layout/css/layout.min.css',
//             './backend/web/assets/e3cb9b53/layouts/layout/css/themes/default.min.css',
//             './backend/web/assets/e3cb9b53/layouts/layout/css/custom.min.css',
//         ]
//     ).pipe(concat('apps.css'))
//         .pipe(minifycss())
//         .pipe(gulp.dest('./backend/web/assets/e3cb9b53/apps/css'))
// });
// gulp.task('scripts', function () {
//     gulp.src([
//         './backend/web/assets/e3cb9b53/global/plugins/jquery.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/bootstrap/js/bootstrap.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/js.cookie.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/jquery.blockui.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/moment.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/morris/morris.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/morris/raphael-min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/dropzone/dropzone.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/fancybox/source/jquery.fancybox.pack.js',
//         './backend/web/assets/e3cb9b53/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js',
//         './backend/web/assets/e3cb9b53/global/scripts/datatable.js',
//         './backend/web/assets/e3cb9b53/global/plugins/datatables/datatables.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js',
//         './backend/web/assets/e3cb9b53/global/scripts/hermo.js',
//         './backend/web/assets/e3cb9b53/apps/scripts/customs.js',
//
//
//     ]).pipe(concat('default.js'))
//         .pipe(uglify())
//         .pipe(gulp.dest('./backend/web/assets/e3cb9b53/apps/scripts'))
//
// })

/**Products**/
// gulp.task('css', function () {
//     gulp.src(
//         // './frontend/web/assets/75257c76/css/*.css'
//         [
//             './backend/web/assets/e3cb9b53/global/plugins/font-awesome/css/font-awesome.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/simple-line-icons/simple-line-icons.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/bootstrap/css/bootstrap.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/morris/morris.css',
//             './backend/web/assets/e3cb9b53/global/plugins/fullcalendar/fullcalendar.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/jqvmap/jqvmap/jqvmap.css',
//             './backend/web/assets/e3cb9b53/global/plugins/datatables/datatables.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
//             './backend/web/assets/e3cb9b53/global/plugins/dropzone/dropzone.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/dropzone/basic.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/fancybox/source/jquery.fancybox.css',
//             './backend/web/assets/e3cb9b53/global/plugins/fileinput/css/fileinput.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css',
//             './backend/web/assets/e3cb9b53/global/css/lightbox.min.css',
//             './backend/web/assets/e3cb9b53/global/css/components-md.min.css',
//             './backend/web/assets/e3cb9b53/global/css/plugins-md.min.css',
//             './backend/web/assets/e3cb9b53/layouts/layout/css/layout.min.css',
//             './backend/web/assets/e3cb9b53/layouts/layout/css/themes/default.min.css',
//             './backend/web/assets/e3cb9b53/layouts/layout/css/custom.min.css',
//         ]
//     ).pipe(concat('apps-products.css'))
//         .pipe(minifycss())
//         .pipe(gulp.dest('./backend/web/assets/e3cb9b53/apps/css'))
// });
// gulp.task('scripts', function () {
//     gulp.src([
//         './backend/web/assets/e3cb9b53/global/plugins/jquery.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/bootstrap/js/bootstrap.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/js.cookie.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/jquery.blockui.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/moment.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/morris/morris.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/morris/raphael-min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/dropzone/dropzone.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/fancybox/source/jquery.fancybox.pack.js',
//         './backend/web/assets/e3cb9b53/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js',
//         './backend/web/assets/e3cb9b53/global/plugins/fileinput/js/fileinput.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/tinymce/tinymce.min.js',
//         './backend/web/assets/e3cb9b53/global/scripts/datatable.js',
//         './backend/web/assets/e3cb9b53/global/plugins/datatables/datatables.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js',
//         './backend/web/assets/e3cb9b53/global/scripts/hermo.js',
//         './backend/web/assets/e3cb9b53/apps/scripts/customs.js',
//
//
//     ]).pipe(concat('products.js'))
//         .pipe(uglify())
//         .pipe(gulp.dest('./backend/web/assets/e3cb9b53/apps/scripts'))
//
// })
/**Products**/
// gulp.task('css', function () {
//     gulp.src(
//         // './frontend/web/assets/75257c76/css/*.css'
//         [
//             './backend/web/assets/e3cb9b53/global/plugins/font-awesome/css/font-awesome.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/simple-line-icons/simple-line-icons.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/bootstrap/css/bootstrap.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/select2/css/select2.min.css',
//             './backend/web/assets/e3cb9b53/global/plugins/select2/css/select2-bootstrap.min.css',
//             './backend/web/assets/e3cb9b53/global/css/components-md.min.css',
//             './backend/web/assets/e3cb9b53/global/css/plugins-md.min.css',
//             './backend/web/assets/e3cb9b53/pages/css/login-5.min.css',
//         ]
//     ).pipe(concat('apps-products.css'))
//         .pipe(minifycss())
//         .pipe(gulp.dest('./backend/web/assets/e3cb9b53/apps/css'))
// });
// gulp.task('scripts', function () {
//     gulp.src([
//         './backend/web/assets/e3cb9b53/global/plugins/jquery.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/bootstrap/js/bootstrap.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/js.cookie.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/jquery.blockui.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/jquery-validation/js/jquery.validate.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/jquery-validation/js/additional-methods.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/select2/js/select2.full.min.js',
//         './backend/web/assets/e3cb9b53/global/plugins/backstretch/jquery.backstretch.min.js',
//         './backend/web/assets/e3cb9b53/global/scripts/app.min.js',
//         './backend/web/assets/e3cb9b53/pages/scripts/login-5.min.js'
//
//
//     ]).pipe(concat('login.js'))
//         .pipe(uglify())
//         .pipe(gulp.dest('./backend/web/assets/e3cb9b53/apps/scripts'))
//
// })
gulp.task('default', ['css']);