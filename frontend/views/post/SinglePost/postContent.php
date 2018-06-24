<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 16.03.15
 * Time: 17:05
 */

use yii\helpers\Markdown;
?>

<h3 class="blogpost_title"><?= $model->title ?></h3>

<div class="blog_post_content">
    <article class="contentarea">
        <?= Markdown::process($model->content) ?>
    </article>
</div>
