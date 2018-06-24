<div class="sidepanel widget_tag_cloud">
    <h6 class="sidebar_header">Tags</h6>
    <div class="tagcloud">
<?php
use yii\helpers\Html;

    foreach($model as $tag)
    {
        echo Html::a(Html::encode($tag->name), ['post/tag', 'title' => $tag->name]);
    }

?>
    </div>
</div>