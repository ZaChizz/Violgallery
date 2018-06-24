<?php
	use yii\helpers\Html;
?>

<div class="img_block wrapped_img">
	<?php
		$img = Html::img(
			$model->getUrl('540x368'),
					['title'=>$model->title, 'alt'=>$model->title]).'<div class="featured_item_fadder"></div><span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>';
			echo Html::a($img,['product/view','id'=>$model->product_id],['class'=>'featured_ico_link', 'title'=>$model->title]);
	?>
</div>