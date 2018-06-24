<div class="row">
    <div class="span12 module_cont module_small_padding featured_items single_feature featured_posts">
        <div class="featured_items">
            <div class="items3 featured_posts" data-count="3">
                <ul class="item_list">
                    <?php
                    if($modelRelated)
                    {
                        foreach ($modelRelated as $related)
                        {
                            echo $this->render('_relatedPost',['model'=>$related]);
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>


