<?php

use yii\helpers\Html;

$comments = $model->comments;

?>
<h4 class="headInModule postcomment"><?= count($comments)?> Comments: </h4>
<ol class="commentlist">
    <?php
    if(count($comments))
    {
        foreach ($comments as $comment)
        {
            echo $this->render('_comment',['model'=>$comment]);
        }
    }
    ?>
</ol>