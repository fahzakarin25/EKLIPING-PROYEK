<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        'resource/news/lib/owlcarousel/assets/owl.carousel.min.css',
        'resource/news/css/style.css',

    ];
    public $js = [
        'resource/news/lib/easing/easing.min.js',
        'resource/news/lib/owlcarousel/owl.carousel.min.js',
        'resource/news/js/main.js',

    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
    
}

?>



