<?php
/**
 * Nikom Theme by HanumanTI for Yii2
 * 20 Oct 2019
 */
namespace backend\themes\nikom;

class NikomAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@backend/themes/nikom/assets';

    public $css = [
        'app-assets/vendors/css/vendors.min.css',
        'app-assets/vendors/css/extensions/unslider.css',
        'app-assets/vendors/css/weather-icons/climacons.min.css',
        'app-assets/fonts/meteocons/style.css',

        'app-assets/css/bootstrap-extended.css',
        'app-assets/css/colors.css',
        'app-assets/css/components.css',

        'app-assets/css/core/menu/menu-types/vertical-menu-modern.css',
        'app-assets/css/core/colors/palette-gradient.css',
        'app-assets/fonts/simple-line-icons/style.css',
        'app-assets/css/core/colors/palette-gradient.css',

        'assets/css/style.css',
    ];

    public $js = [
        //'app-assets/vendors/js/charts/raphael-min.js',
        'app-assets/vendors/js/extensions/unslider-min.js',
        'app-assets/vendors/js/ui/affix.js',
        'app-assets/vendors/js/ui/blockUI.min.js',
        'app-assets/vendors/js/ui/headroom.min.js',
        'app-assets/vendors/js/ui/jquery.matchHeight-min.js',
        'app-assets/vendors/js/ui/jquery.sticky.js',
        'app-assets/vendors/js/ui/jquery.sticky-kit.min.js',
        'app-assets/vendors/js/ui/jquery-sliding-menu.js',
        'app-assets/vendors/js/ui/prism.min.js',
        'app-assets/vendors/js/ui/prism-treeview.js',
        'app-assets/vendors/js/ui/screenfull.min.js',
        'app-assets/vendors/js/ui/unison.min.js',
        'assets/js/scripts.js',
        'app-assets/js/core/app-menu.js',
        'app-assets/js/core/app.js',

    ];

    public $depends = [
        'yii\bootstrap4\BootstrapAsset',
        'yii\web\JqueryAsset'
    ];
}