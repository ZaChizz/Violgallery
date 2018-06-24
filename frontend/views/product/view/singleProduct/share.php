<?php
use yii\helpers\Url;
?>
<div class="blog_post-footer sp-blog_post-footer ">
    <div class="blogpost_share">
        <span>Share this:</span>
        <a href="javascript:void(0)" class="share_facebook"><i class="stand_icon icon-facebook-square"></i></a>
        <a href="javascript:void(0)" class="share_pinterest"><i class="stand_icon icon-pinterest"></i></a>                                                    <a href="javascript:void(0)" class="share_tweet"><i class="stand_icon icon-twitter"></i></a>
        <a href="javascript:void(0)" class="share_gplus"><i class="icon-google-plus-square"></i></a>
        <div class="clear"></div>
    </div>

    <div class="block_likes">
	    <div class="price_item_cost">
            <a href="#">$ Price on request</a>
        </div>
        <div class="post-views"><i class="stand_icon icon-eye"></i> <span><?=$model->view?></span></div>
        <div class="gallery_likes gallery_likes_add  productlike" rel="<?= $model->product_id ?>" href="<?= Url::to(['product/like']) ?>"  data-on-done="simpleDone">
            <i class="stand_icon <?= $model->find_like()?'icon-heart':'icon-heart-o' ?>" id="iconLikes_<?= $model->product_id ?>" rel="<?= $model->product_id ?>" href="<?= Url::to(['product/like']) ?>"  data-on-done="simpleDone"></i>
            <span id="productLike_<?= $model->product_id ?>" rel="<?= $model->product_id ?>" href="<?= Url::to(['product/like']) ?>"  data-on-done="simpleDone"><?= $model->like ?></span>
        </div>
    </div>

    <div class="clear"></div>
</div>