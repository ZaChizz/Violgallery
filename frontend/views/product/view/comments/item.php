<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>

<li class="comment odd alt thread-even depth-1">
    <div class="stand_comment">
        <div class="commentava wrapped_img">
            <?php
			$author = $model->author;
            if ($author->src) {
                echo
                Html::img(
                    $author->getUrl('96x96'),
                    ['title'=>$author->username, 'alt'=>$author->username,'class'=>'avatar', 'height'=>'96', 'width'=>'96']);
            }
			else
				echo
                Html::img(
                   Yii::getAlias('@frontendPlaceholder/user.jpg',
                    ['title'=>$author->username, 'alt'=>$author->username,'class'=>'avatar', 'height'=>'96', 'width'=>'96']));
				
            ?>
            <div class="img_inset"></div>
        </div>
        <div class="thiscommentbody">
            <div class="comment_info">
                <h6 class="author_name"><?= $model->author->username ?></h6>
                <h6 class="date"><?= date('F d, Y',$model->create_time)?></h6>
        </div>
        <p><?= Markdown::process($model->content)?></p>
        </div>
		<div class="clear"></div>
    </div>
</li><!-- #comment-## -->