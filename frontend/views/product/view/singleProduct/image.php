<?php
	use yii\helpers\Html;
?>
<div class="pf_output_container">
    <div class="theme-default ">
		<?php
			if (isset($model->productImages[0])) {
				echo Html::img(
                    $model->productImages[0]->getUrl('1170x'),
					['title'=>$model->productImages[0]->title, 'alt'=>$model->productImages[0]->title, 'class'=>'featured_image_standalone']);
			}
            else
            {
                echo Html::img(
                    $model->getUrl('1170x563'),
                    ['title'=>'placeholder', 'alt'=>'placeholder', 'class'=>'featured_image_standalone']);
            }
		?>
	</div>
</div>