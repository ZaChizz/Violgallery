<?php
	$comments = $model->commentProducts;
?>
<div class="row">
    <div class="span12">
        <div id="comments">
            <h4 class="headInModule postcomment"><?=count($comments)?> Comments: </h4>
            <ol class="commentlist">
			<?php
				foreach($comments as $comment)
					echo $this->render('comments/item',['model'=>$comment]);
			?>
            </ol>

            <hr class="comment_hr">
            <?php if(!Yii::$app->user->can('comment')):?>
                <h3 id="reply-title" class="comment-reply-title">Only registered users can leave comments!</h3>
            <?php endif;?>
            <?= Yii::$app->user->can('comment')?$this->render('comments/form',['model'=>$commentModel]):''; ?>
        </div>
    </div>
</div>