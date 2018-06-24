<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 16.03.15
 * Time: 17:05
 */
use yii\helpers\Html;
use frontend\widgets\PostTags;
use yii\helpers\Url;

    $images = $model->postImage;

?>
<div class="pf_output_container">
    <?php
        if (isset($images[0])) {
            echo Html::img(
                        $images[0]->getUrl('1170x563'),
                        ['title'=>$images[0]->title, 'alt'=>$images[0]->title]);
                }
            ?>
</div>
<div class="blog_content">
    <div class="blogpreview_top">
        <div class="box_date">
			<span class="box_month"><?= strtoupper(date('D',$model->update_time))?></span>
            <span class="box_day"><?= date('d',$model->update_time)?></span>
		</div>
		<div class="author_ava">
		<!--	<img alt="" src="img/avatar/2.jpg" class="avatar" height="72" width="72" />-->
			<?php
			if($model->author->src)
                echo Html::img(
                    $model->author->getUrl('100x100'),
                    ['title'=>$model->author->username, 'alt'=>$model->author->username]);
			else
				echo Html::img(
                   Yii::getAlias('@frontendPlaceholder/user.jpg',
                    ['title'=>$model->author->username, 'alt'=>$model->author->username, 'height'=>'100', 'width'=>'100']));
            ?>
		</div>
		<div class="listing_meta">
            <span>by <a href="javascript:void(0)"><?= $model->author->username ?></a></span>
            <span>in <?= Html::a($model->category->title,['post/category','category_id'=>$model->category->category_id]) ?></span>
            <span><a href="javascript:void(0)"><?= count($model->comments) ?> comments</a></span>
            <span class="preview_meta_tags">tags:
                <?= PostTags::widget([
                    'model' => $model
                ]) ?>
            </span>
        </div >
    </div>
	<h3 class="blogpost_title">
		<?= Html::a($model->title, ['post/view', 'id' => $model->id]) ?>
	</h3>
    <article class="contentarea"><?= $model->preview_content ?></article>
	<div class="preview_footer">
        <?= Html::a('Read More', ['post/view', 'id' => $model->id], ['class'=>'shortcode_button btn_small btn_type5 reamdore']) ?>
        <div class="block_likes">
            <div class="post-views"><i class="stand_icon icon-eye"></i> <span><?= $model->views ?></span></div>
            <div class="gallery_likes gallery_likes_add productlike" rel="<?= $model->id ?>" href="<?= Url::to(['post/like']) ?>"  data-on-done="simpleDone">
                <i class="stand_icon <?= $model->find_like()?'icon-heart':'icon-heart-o' ?>" id="iconLikes_<?= $model->id ?>" rel="<?= $model->id ?>" href="<?= Url::to(['post/like']) ?>"  data-on-done="simpleDone"></i>
                <span id="productLike_<?= $model->id ?>" rel="<?= $model->id ?>" href="<?= Url::to(['post/like']) ?>"  data-on-done="simpleDone"><?= $model->likes ?></span>
            </div>
        </div>
    </div>
</div>