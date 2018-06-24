<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 16.03.15
 * Time: 17:05
 */

use yii\helpers\Html;
use yii\helpers\Markdown;

$images = $model->postImage;
?>
<div class="pf_output_container">
    <div class="slider-wrapper theme-default ">
        <div class="nivoSlider">
            <?php
            if (isset($images[0])) {
                foreach($images as $image)
                {
                    echo Html::img($image->getUrl('1170x563'),['alt'=>$image->title]);
                }
            }
            ?>
        </div>
    </div>
</div>