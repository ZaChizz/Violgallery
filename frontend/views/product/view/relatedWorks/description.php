<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="featured_items_body">
    <div class="featured_items_title">
		<h6><?=$model->title?></h6>
    </div>
    <div class="featured_item_content">
        <?=Html::encode($model->description)?>
   <!--     <a class="morelink" href="simple_fullwidth_image_post.html">Read more</a>-->
        <div class="featured_items_meta">
			<div class="preview_categ">in <?=$model->category->title?></div>
            <div class="gallery_likes gallery_likes_add productlike" rel="<?= $model->product_id ?>" href="<?= Url::to(['product/like']) ?>"  data-on-done="simpleDone">
                <i class="stand_icon <?= $model->find_like()?'icon-heart':'icon-heart-o' ?>" id="iconLikes_<?= $model->product_id ?>" rel="<?= $model->product_id ?>" href="<?= Url::to(['product/like']) ?>"  data-on-done="simpleDone"></i>
                <span id="productLike_<?= $model->product_id ?>" rel="<?= $model->product_id ?>" href="<?= Url::to(['product/like'])?>"  data-on-done="simpleDone"><?= $model->like ?></span>
            </div>
        </div>
    </div>
</div>