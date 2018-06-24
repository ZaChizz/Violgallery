<?php
use yii\helpers\Html;
?>

<?php
	if(isset($model->productImages[0]))
    {
        $img = '<img src="'.$model->productImages[0]->getUrl('540x368').'" alt="'.$model->productImages[0]->title.'"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>';
    }
    else
    {
        $img = '<img src="'.$model->getUrl('540x368').'" alt="placeholder"><div class="gallery_fadder"></div><span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>';
    }
?>
<div class="<?=$model->category->option_value?> element portfolio_item">
    <div class="portfolio_item_block">
        <div class="portfolio_item_wrapper">
            <div class="portfolio_item_img gallery_item_wrapper">
                    <?=
                    Html::a($img,['product/view','id' => $model->product_id])
                    ?>
            </div>
        </div>
        <div class="portfolio_content portfolio_content4">
            <h6><?=Html::a($model->title,['product/view','id' => $model->product_id])?></h6>
        </div>
    </div>
</div>