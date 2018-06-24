<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 29.05.2015
 * Time: 0:21
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class ThemeCssAsset extends AssetBundle
{
    public $sourcePath = '@backendWeb/css';
    public $css = [
        'bootstrap.min.css',
        'metisMenu.min.css',
        'dataTables.bootstrap.css',
        'dataTables.responsive.css',
        'sb-admin-2.css',
        'font-awesome.min.css'

    ];

    public $cssOptions = [
        'position' => View::POS_HEAD,
        'media' => 'all'
    ];

}

