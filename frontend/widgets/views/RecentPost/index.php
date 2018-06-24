<div class="sidepanel widget_posts">
    <h6 class="sidebar_header">Featured Posts</h6>
    <ul class="recent_posts">
        <?php
            foreach($model as $post)
            {
                echo $this->render('subView/index', [
                    'model' => $post,
                ]);
            }
        ?>
    </ul>
</div>