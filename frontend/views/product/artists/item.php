<?php

use yii\helpers\Html;
use yii\helpers\Url;


    if(isset($model->productImages[0]))
    {
        $img = Html::a(Html::img($model->productImages[0]->getUrl('540x368'),['alt'=>$model->title,'class'=>'fw_featured_image','width'=>540]).'<div class="gallery_fadder"></div><span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>',
            ['product/view','id'=>$model->product_id],['target'=>'_blank']);
    }
    else
    {
        $img = Html::a(Html::img($model->getUrl('540x368'),['alt'=>$model->title,'class'=>'fw_featured_image','width'=>540]).'<div class="gallery_fadder"></div><span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>',
            ['product/view','id'=>$model->product_id],['target'=>'_blank']);
    }
?>
<div class="blogpost_preview_fw element <?= $element.'_element' ?>">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <?= $img ?>
        </div>
        <div class="grid-port-cont">

            <h6><?= Html::a($model->title,['product/view','id'=>$model->product_id],['target'=>'_blank']) ?></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span><?=$model->view?></span></div>
                <div class="gallery_likes gallery_likes_add already_liked productlike" rel="<?= $model->product_id ?>" href="<?= Url::to(['product/like']) ?>"  data-on-done="simpleDone">
                    <i class="stand_icon <?= $model->find_like()?'icon-heart':'icon-heart-o' ?>" id="iconLikes_<?= $model->product_id ?>" rel="<?= $model->product_id ?>" href="<?= Url::to(['product/like']) ?>"  data-on-done="simpleDone"></i>
                    <span id="productLike_<?= $model->product_id ?>" rel="<?= $model->product_id ?>" href="<?= Url::to(['product/like']) ?>"  data-on-done="simpleDone"><?= $model->like ?></span>
                </div>
            </div>
        </div>
        <h6 class="highlighted_colored"><?= $model->artist->lastname.'&nbsp;'.$model->artist->name ?></h6>
    </div>
</div>