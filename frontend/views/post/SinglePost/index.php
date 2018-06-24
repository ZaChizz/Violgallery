<?php
$this->registerJs("$('body').on('click','.productlike',handleAjaxLink);", \yii\web\View::POS_READY);
?>
<div class="posts-block simple-post hasLS">
    <div class="contentarea">
        <div class="row">
            <div class="span12 module_cont module_blog module_none_padding module_blog_page">
                <div class="prev_next_links">
                    <div class="fleft"><a href="javascript:void(0);">Previous Post</a></div>
                    <div class="fright"><a href="javascript:void(0);">Next Post</a></div>
                </div>
                <div class="blog_post_page">
                    <?php switch ($model->typeView)
                    {
                        case 1: echo  $this->render('postImage', ['model' => $model]); break;
                        case 2: echo  $this->render('postSlider', ['model' => $model]); break;
                    }
                    ?>
                    <?= $this->render('postPreview', ['model' => $model]) ?>
                    <?= $this->render('postContent', ['model' => $model]) ?>
                    <?= $this->render('postFooter', ['model' => $model]) ?>
                    <?= $this->render('aboutAuthor', ['model' => $model]) ?>
                </div>
            </div>
        </div>

        <?= $this->render('relatedPosts', ['model' => $model, 'modelRelated'=> $modelRelated]) ?>

        <div class="row">
            <div class="span12">
                <div id="comments">
                    <?= $this->render('commentsContainer', ['model' => $model]) ?>
                    <hr class="comment_hr">
                    <?= $this->render('commentRespond', ['model' => $commentModel]) ?>
                </div>
            </div>
        </div>
    </div>
</div>