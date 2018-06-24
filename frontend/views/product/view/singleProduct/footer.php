<?php
	use yii\helpers\Html;
?>

<div class="blogpreview_top">
    <div class="box_date">
        <span class="box_month"><?= strtoupper(date('D',$model->update_time))?></span>
        <span class="box_day"><?= date('d',$model->update_time)?></span>
    </div>
    <div class="listing_meta">
        <span>in <a href="javascript:void(0)">Portrait</a></span>
        <span><a href="javascript:void(0)">3 comments</a></span>
        <span class="preview_skills">Time spent: 12 hours</span><span class="preview_skills">Camera: Canon EOS 5D Mark II</span>
    </div>
    <div class="author_ava">
		<?php 
			if($model->artist->image)
				echo Html::img(
					$model->artist->getUrl('72x72'),
					['title'=>$model->artist->name.' '.$model->artist->lastname, 'alt'=>$model->artist->name.' '.$model->artist->lastname, 'class'=>'avatar', 'height'=>72, 'width'=>72]);
			else
				echo Html::img(Yii::getAlias('@frontendPlaceholder/artist.jpg',
					['title'=>$model->artist->name.' '.$model->artist->lastname, 'alt'=>$model->artist->name.' '.$model->artist->lastname, 'class'=>'avatar', 'height'=>72, 'width'=>72]
				));
		?>
	</div>
</div>
<h3 class="blogpost_title"><?=$model->title?></h3>