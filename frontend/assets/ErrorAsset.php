<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\assets;
use yii\web\AssetBundle;
/**
 * Description of ErrorAsset
 *
 * @author Дмитрий
 */
class ErrorAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/errorstyle.css',
    ];
    //put your code here
}
