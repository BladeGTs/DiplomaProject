<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
   //   'css/newCascadeStyleSheet.css',
        'css/style.css',
        'css/themify-icons/themify-icons.css',
      
        'css/jquery.dataTables.min.css',

        'js/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'css/icofont/css/icofont.css'
    ];
    public $js = [
        'js/bower_components/modernizr/modernizr.js',
        'js/script.js',
        'js/bower_components/jquery-slimscroll/jquery.slimscroll.js',

    ]; 
       
    public $depends = [
        'yii\web\YiiAsset',
       'yii\bootstrap\BootstrapAsset',
    ];
}
