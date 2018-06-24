<ul class="ribbon_list">
<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 06.01.2016
 * Time: 16:10
 */
use yii\helpers\Html;

    foreach($model as $key=>$item)
    {
        $_key = ++$key;
        echo '<li data-count="'.$_key.'" data-title=" : '.$item->title.'" class="slide'.$key.'"><div class="slide_wrapper">'.Html::img($item->getUrl('x910')).'</div></li>';
    }

?>
</ul>