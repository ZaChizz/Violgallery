<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 29.05.2015
 * Time: 21:16
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
         'app\assets\ThemeCssAsset',
         'app\assets\ThemeJsAsset',
         'app\assets\ThemeJqueryAsset'

    ];
}
