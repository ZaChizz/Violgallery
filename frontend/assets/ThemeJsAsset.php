<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class ThemeJsAsset extends AssetBundle
{
    public $sourcePath = '@frontendWeb/js';
    public $js = [
        'jquery-ui.min.js',
        'modules.js',
        'theme.js',
        'jquery.isotope.min.js',
        'sorting.js'

    ];

    public $jsOptions = [
        'position' => View::POS_END,
    ];

}

