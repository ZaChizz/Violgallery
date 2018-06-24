<div class="blog_post_preview">
    <div class="post_preview_wrapper">
<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 14.02.15
 * Time: 23:26
 */

switch ($model->typeView)
{
    case 1:
        echo $this->render('typeView/_imageContainer', ['model' => $model]); break;
    case 2:
		echo $this->render('typeView/_imageSlider', ['model' => $model]); break;
	default:
		echo $this->render('typeView/_imageContainer', ['model' => $model]);
}

?>
    </div>
</div>
