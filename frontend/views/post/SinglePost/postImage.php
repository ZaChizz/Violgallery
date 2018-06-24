<!--Tamplate
<div class="pf_output_container">
    <img alt="" src="img/blog/1170_563/6.jpg" class="featured_image_standalone">
</div>
-->
<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 16.03.15
 * Time: 17:05
 */

use yii\helpers\Html;

$images = $model->postImage;
?>
<div class="pf_output_container">
        <?php
        if (isset($images[0])) {
            echo
                Html::img(
                    $images[0]->getUrl('1170x563'),
                    ['title'=>$images[0]->title, 'alt'=>$images[0]->title, 'class'=>'featured_image_standalone']);
        }
        ?>
</div>


