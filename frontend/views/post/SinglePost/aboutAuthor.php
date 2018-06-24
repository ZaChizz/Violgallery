<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 16.03.15
 * Time: 17:05
 */

use yii\helpers\Markdown;
use yii\helpers\Html;
$author = $model->author;
?>
<div class="blogpost_user_meta">
    <div class="author-ava">
        <?php
            if ($author->src) {
                echo
                Html::img(
                    $author->getUrl('96x96'),
                    ['title'=>$author->username, 'alt'=>$author->username, 'height' => '96', 'width'=>'96']);
            }
			else
				echo
                Html::img(
                   Yii::getAlias('@frontendPlaceholder/user.jpg',
                    ['title'=>$author->username, 'alt'=>$author->username, 'height'=>'96', 'width'=>'96']));
        ?>
    </div>
    <div class="author-name">
        <h6>About the Author: <a href="javascript:void(0);" title="Posts by $author->username" rel="author"><?= $author->username ?></a></h6>
    </div>
    <div class="author-description"><?= Markdown::process($author->profile) ?></div>
    <div class="clear"></div>
</div>