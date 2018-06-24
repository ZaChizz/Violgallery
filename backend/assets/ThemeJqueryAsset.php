<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 29.05.2015
 * Time: 22:54
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class ThemeJqueryAsset extends AssetBundle
{
    public $sourcePath = '@backendWeb/js';
    public $js = [
        'jquery.min.js',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

}

