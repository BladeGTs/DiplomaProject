<?php
namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Description of LoginAssets
 *
 * @author Дмитрий
 */
class SignupAssets extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'js/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'css/style.css',
        'css/color/color-1.css',
        'css/icofont/css/icofont.css',
    ];
    public $js = [
        
    ];

}
