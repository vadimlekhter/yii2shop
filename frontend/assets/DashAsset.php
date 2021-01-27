<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class DashAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/dash';
    public $depends = [
        'frontend\assets\AppAsset'
    ];
    public $css = [
        'css/dash.css'
    ];
    public $js = [
        'js/dash.all.min.js',
//        'js/dash.js'
    ];
//    public $jsOptions = ['position' => \yii\web\View::POS_READY];
    public $publishOptions = [
        'forceCopy' => true
    ];
}