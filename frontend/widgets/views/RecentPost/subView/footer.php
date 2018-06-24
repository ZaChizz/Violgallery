<!--Template
<li>
    <a href="#" class="post-author-avatar"><span><img src="http://placehold.it/50x50" alt=""></span></a>
    <div class="post-content">
        <a href="#" class="post-title">Mircale is available in wordpress</a>
        <p class="post-meta">By <a href="#">Admin</a>  .  12 Nov, 2014</p>
    </div>
</li>
-->

<?php
use yii\helpers\Html;

$images = $model->postImage;
?>
<li>
    <?php if (isset($images[0])): ?>
        <?= Html::a('<span>'.
            Html::img(
                $images[0]->getUrl('50x50'),
                ['title'=>$images[0]->title, 'alt'=>$images[0]->title]).'</span>',
            ['post/view', 'id' => $model->id],
            ['class' => 'post-author-avatar']
        )
        ?>
    <?php endif; ?>
    <?php if (!isset($images[0])): ?>
        <?= Html::a(
            '<span>'.Html::img(Yii::getAlias('@frontendPlaceholder/50x50.gif')).'</span>',
            ['post/view', 'id' => $model->id]
        )
        ?>
    <?php endif; ?>
    <div class="post-content">
        <?= Html::a(Html::encode($model->title), ['post/view', 'id' => $model->id], ['class' => 'post-title']) ?>
        <p class="post-meta">By <a href="#"><?= $model->author->username ?></a>  .  <?= date('d',$model->update_time)?> <?= date('D',$model->update_time)?>, <?= date('Y',$model->update_time)?></p>
    </div>
</li>