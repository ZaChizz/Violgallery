<h5 class="section-title box">Recent Posts</h5>
<ul class="recent-posts">
    <?php
    foreach($model as $post)
    {
        echo $this->render('subView/footer', [
            'model' => $post,
        ]);
    }
    ?>
</ul>