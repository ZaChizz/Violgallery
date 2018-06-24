<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 16.03.15
 * Time: 17:05
 */
use yii\helpers\Html;
use frontend\widgets\PostTags;

?>
<div class="blogpreview_top">
    <div class="box_date">
        <span class="box_month"><?= date('D',$model->update_time)?></span>
        <span class="box_day"><?= date('d',$model->update_time)?></span>
    </div>
    <div class="listing_meta">
        <span>in <a href="javascript:void(0);" title="View all posts in Cities">Cities</a></span>
        <span><a href="javascript:void(0);"><?= count($model->comments) ?> comments</a></span>
        <span>tags:
            <?= PostTags::widget([
                'model' => $model
            ]) ?>
        </span>
    </div>

    <div class="author_ava">
        <?php
		if ($model->author->src) 
			echo Html::img(
				$model->author->getUrl('72x72'),
				['title'=>$model->author->username, 'alt'=>$model->author->username, 'class'=>'avatar', 'height'=>'72', 'width'=>'72']);
		else
			echo
                Html::img(
                   Yii::getAlias('@frontendPlaceholder/user.jpg',
                    ['title'=>$model->author->username, 'alt'=>$model->author->username, 'class'=>'avatar','height'=>'72', 'width'=>'72']));
        ?>
    </div>
</div>
