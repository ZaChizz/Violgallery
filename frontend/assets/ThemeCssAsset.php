<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class ThemeCssAsset extends AssetBundle
{
    public $sourcePath = '@frontendWeb/css';
    public $css = [
        'theme.css',
        'responsive.css',
        'custom.css'
    ];

    public $cssOptions = [
        'position' => View::POS_HEAD,
        'media' => 'all'
    ];

}

