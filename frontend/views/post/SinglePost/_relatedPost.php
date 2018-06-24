<?php
use yii\helpers\Html;
use yii\helpers\Url;

$post = $model->related;
$images = $post->postImage;
?>



<li>
    <div class="item">
        <div class="item_wrapper">
            <div class="img_block wrapped_img">
                <div class="img">
                    <?php if (isset($images[0])): ?>
                        <?= Html::a(
                            Html::img(
                                $images[0]->getUrl('540x368')).'<div class="featured_item_fadder"></div><span  class="gallery_ico"><i class="stand_icon icon-eye"></i></span>',
                            ['post/view', 'id' => $post->id]
                        )
                        ?>
                    <?php endif; ?>
                    <?php if (!isset($images[0])): ?>
                        <?= Html::a(
                            Html::img(Yii::getAlias('@frontendPlaceholder/540x368.gif')).'<div class="featured_item_fadder"></div>
                            <span  class="gallery_ico"><i class="stand_icon icon-eye"></i></span>',
                            ['post/view', 'id' => $post->id]
                        )
                        ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="featured_items_body featured_posts_body">
                <div class="featured_items_title">
                    <h6><?= Html::a($post->title, ['post/view', 'id' => $post->id]) ?></h6>
                </div>
                <div class="featured_item_content">
                    Amet dolor, ac consectetur adipiscing elit egestas egetfusce lacinia sed purus
                    <?= Html::a('Read More', ['post/view', 'id' => $post->id],['class'=>'morelink']) ?>
                    <div class="featured_items_meta">
                        <div class="preview_categ">
                            <span class="preview_meta_data">in <a href="javascript:void(0);"><?= $post->author->username ?></a></span>
                            <span class="preview_meta_comments"><a href="javascript:void(0);"><?= count($post->comments)?> comments</a></span>
                        </div>

                        <div class="gallery_likes gallery_likes_add already_liked productlike" rel="<?= $model->related->id ?>" href="<?= Url::to(['post/like']) ?>"  data-on-done="simpleDone">
                            <i class="stand_icon <?= $model->related->find_like()?'icon-heart':'icon-heart-o' ?>" id="iconLikes_<?= $model->related->id ?>" rel="<?= $model->related->id ?>" href="<?= Url::to(['post/like']) ?>"  data-on-done="simpleDone"></i>
                            <span id="productLike_<?= $model->related->id ?>" rel="<?= $model->related->id ?>" href="<?= Url::to(['post/like']) ?>"  data-on-done="simpleDone"><?= $model->related->likes ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
