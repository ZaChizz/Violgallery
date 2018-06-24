<div class="row">
    <div class="span12 module_cont module_blog module_none_padding module_blog_page">
        <div class="prev_next_links">
            <div class="fleft"><a href="javascript:void(0)">Previous Post</a></div>
            <div class="fright"><a href="javascript:void(0)">Next Post</a></div>
        </div>
        <div class="blog_post_page sp_post">     
            <?=$this->render('singleProduct/image.php',['model' => $model])?>        
            <?=$this->render('singleProduct/footer.php',['model' => $model])?> 
            
        </div><!--.blog_post_page -->

        <div class="blog_post_content">
            <article class="contentarea sp_contentarea">
				<?=$this->render('singleProduct/description.php',['model' => $model])?> 
                <?=$this->render('singleProduct/listProduct.php',['model' => $model, 'recentModel'=>$recentModel])?>
            </article>
        </div>
		<?=$this->render('singleProduct/share.php',['model' => $model])?>
		<?=$this->render('singleProduct/about.php',['model' => $model])?>
    </div>
</div>