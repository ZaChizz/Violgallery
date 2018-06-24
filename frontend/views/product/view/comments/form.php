<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div id="respond" class="comment-respond">
    <h3 id="reply-title" class="comment-reply-title">Leave a Comment!</h3>
<!--    <form action="javascript:void(0)" method="post" id="commentform" class="comment-form">
        <label class="label-message"></label><textarea name="comment" cols="45" rows="5" placeholder="Message..." id="comment-message" class="form_field"></textarea>
        <p class="form-allowed-tags">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:  <code>&lt;a href=&quot;&quot; title=&quot;&quot;&gt; &lt;abbr title=&quot;&quot;&gt; &lt;acronym title=&quot;&quot;&gt; &lt;b&gt; &lt;blockquote cite=&quot;&quot;&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=&quot;&quot;&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=&quot;&quot;&gt; &lt;strike&gt; &lt;strong&gt; </code></p>
        <p class="form-submit"><input name="submit" type="submit" id="submit" value="Post Comment" /></p>
    </form>-->
    <?php $form = ActiveForm::begin([
        'id' => 'commentForm',
        'class' => 'comment-form',
        'action' => ['comment-product/comment'],
        'fieldConfig' => [
            'template' => "{input}\n{hint}\n{error}",
        ]
    ]); ?>
    <?= $form->field($model, 'content',['template' => '<label class="label-message"></label>{input}{error}{hint}'])->textArea(['placeholder' => 'Message...','class'=>'form_field','cols'=>'45', 'rows'=>'5']) ?>
    <?= Html::activeHiddenInput($model, 'product_id') ?>
    <p class="form-submit"><?= Html::tag('input','login',['type'=>'submit', 'value'=>'Post Comment']) ?></p>

    <?php ActiveForm::end(); ?>

</div><!-- #respond -->
