<div class="row">
    <div class="span12 module_number_2 module_cont pb20 module_gallery">
        <div class="list-of-images images_in_a_row_3">
            <?php
                foreach($recentModel as $product)
                {
                    echo $this->render('listProduct/product.php',['model' => $product]);
                }
            ?>
            <div class="clear"></div>
        </div>
    </div><!-- .module_cont -->
</div>