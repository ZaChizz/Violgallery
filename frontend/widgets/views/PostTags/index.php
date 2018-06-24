<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 01.04.15
 * Time: 21:32
 */
use yii\helpers\Html;

foreach($tags as $tag)
{
    echo Html::a(Html::encode($tag).'&nbsp;', ['post/tag', 'title' => $tag]);
}