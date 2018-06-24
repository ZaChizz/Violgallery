<?php
	use yii\helpers\Html;
?>
<div class="blogpost_user_meta">
    <div class="author-ava">
		<?php 
			if($model->artist->image)
				echo Html::img(
					$model->artist->getUrl('96x96'),
					['title'=>$model->artist->name.' '.$model->artist->lastname, 'alt'=>$model->artist->name.' '.$model->artist->lastname, 'class'=>'avatar', 'height'=>96, 'width'=>96]);
			else
				echo Html::img(Yii::getAlias('@frontendPlaceholder/artist.jpg',
					['title'=>$model->artist->name.' '.$model->artist->lastname, 'alt'=>$model->artist->name.' '.$model->artist->lastname, 'class'=>'avatar', 'height'=>96, 'width'=>96]
				));
		?>
	</div>
    <div class="author-name"><h6>About the Author: <a href="javascript:void(0)" title="Posts by gt3dev"><?=$model->artist->name.' '.$model->artist->lastname?></a></h6></div>
    <div class="author-description"><?=Html::encode($model->artist->about)?></div>
    <div class="clear"></div>
</div>