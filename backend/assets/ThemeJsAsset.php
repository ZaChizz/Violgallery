<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 29.05.2015
 * Time: 0:23
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class ThemeJsAsset extends AssetBundle
{
    public $sourcePath = '@backendWeb/js';
    public $js = [
    //    'jquery.min.js',
        'bootstrap.min.js',
        'metisMenu.min.js',
        'jquery.dataTables.min.js',
        'dataTables.bootstrap.min.js',
        'sb-admin-2.js'

    ];

    public $jsOptions = [
        'position' => View::POS_END,
    ];

}

