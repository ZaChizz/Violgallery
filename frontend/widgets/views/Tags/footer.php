<h5 class="section-title box">Popular Tags</h5>
<div class="tags">
<?php
    use yii\helpers\Html;

    foreach($model as $tag)
    {
        echo Html::a(Html::encode($tag->name).'&nbsp;', ['post/tag', 'title' => $tag->name], ['class' => 'tag']);
    }
?>
</div>