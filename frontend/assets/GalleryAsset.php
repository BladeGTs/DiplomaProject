<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\assets;
use yii\web\AssetBundle;
use yii\web\View;
/**
 * Description of GalleryAsset
 *
 * @author Дмитрий
 */
class GalleryAsset extends AssetBundle {
    public $css = [
        'css/gallery/style.css',
    ];
    
    public $js =[
      'js/isotope/jquery.isotope.js',  
    ];
    
    public $depends =[
        'yii\web\JqueryAsset',
    ];
    
    public $jsOptions =[
      'position' => View::POS_END  
    ];
}
