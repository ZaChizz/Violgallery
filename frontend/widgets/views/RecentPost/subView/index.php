<!--

            <li>
                <div class="recent_posts_img"><img src="img/blog/thumbs/1.jpg" alt=""></div>
                <div class="recent_posts_content">
                    <a class="post_title read_more" href="simple_fullwidth_image_post.html">Sed libero augue</a>
                    <span class="recent_posts_date">March 04, 2014</span>
                </div>
                <div class="clear"></div>
            </li>

-->

<?php
use yii\helpers\Html;

$images = $model->postImage;
?>
<li>
    <div class="recent_posts_img">
    <?php if (isset($images[0])): ?>
    <?=
        Html::img(
            $images[0]->getUrl('96x96'),
            ['title'=>$images[0]->title, 'alt'=>$images[0]->title])
    ?>
    <?php endif; ?>
    <?php if (!isset($images[0])): ?>
    <?= Html::a(
        '<span>'.Html::img(Yii::getAlias('@frontendPlaceholder/96x96.gif')).'</span>',
        ['post/view', 'id' => $model->id]
    )
    ?>
    <?php endif; ?>
    </div>
    <div class="recent_posts_content">
        <?= Html::a(Html::encode($model->title), ['post/view', 'id' => $model->id], ['class' => 'post_title read_more']) ?>
        <span class="recent_posts_date">
            <?= date('F',$model->update_time)?>
            <?= date('d',$model->update_time)?>,
            <?= date('Y',$model->update_time)?>
        </span>
    </div>
    <div class="clear"></div>
</li>