<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'fonts/css/font-awesome.min.css',
        'css/bootstrap-switch.min.css',
        'css/animate.min.css',
        'css/custom.css',
        'css/icon.css',
        'css/maps/jquery-jvectormap-2.0.1.css',
        'css/icheck/flat/green.css',
        'css/floatexamples.css',
        'css/select2.min.css',
        'css/datatables/tools/css/dataTables.tableTools.css',
        'css/jquery.fancybox.css',
    ];
    public $js = [
//'js/jquery.min.js',
        'js/jquery-ui.min.js',
        'js/nprogress.js',
        'js/bootstrap-switch.min.js',
        //đồng hồ đo chỉ số 
        'js/gauge/gauge.min.js',
        //'js/gauge/gauge_demo.js',
        'js/chartjs/chart.min.js',
        'js/progressbar/bootstrap-progressbar.min.js',
        'js/nicescroll/jquery.nicescroll.min.js',
        'js/moment.min.js',
        'js/datepicker/daterangepicker.js',
        'js/flot/jquery.flot.js',
        'js/flot/jquery.flot.pie.js',
        'js/flot/jquery.flot.orderBars.js',
        'js/flot/jquery.flot.time.min.js',
        'js/flot/date.js',
        'js/flot/jquery.flot.spline.js',
        'js/flot/jquery.flot.stack.js',
        'js/flot/curvedLines.js',
        'js/flot/jquery.flot.resize.js',
        'js/maps/jquery-jvectormap-2.0.1.min.js',
        'js/maps/gdp-data.js',
        'js/maps/jquery-jvectormap-world-mill-en.js',
        'js/maps/jquery-jvectormap-us-aea-en.js',
        'js/tinymce/tinymce.min.js',
        'js/select2.min.js',
        'js/timecircles.js',
        'js/jquery.textarea_autosize.min.js',
        'js/jquery.uploadfile.min.js',
        'js/datatables/js/jquery.dataTables.js',
        'js/datatables/tools/js/dataTables.tableTools.js',
        'js/custom.js',
        'js/jquery.iframe-post-form.js',
        //Morris.Bar
        'js/moris/raphael-min.js',
        'js/moris/morris.js',
        'js/jquery.observe_field.js',
//        'js/jquery.mousewheel.js',
        'js/jquery.fancybox.js',
        'js/jquery.nestable.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
