<?php
	use yii\helpers\Html;
?>

<div class="gallery_item">
    <div class="gallery_item_padding">
        <div class="gallery_item_wrapper">
		<?php
            if(isset($model->productImages[0]))
            {
                $img = Html::img(
                        $model->productImages[0]->getUrl('570x401'),
                        ['title'=>$model->productImages[0]->title, 'alt'=>$model->productImages[0]->title, 'width'=>570,  'height'=>401]).'<div class="featured_item_fadder"></div><span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>';
                echo Html::a($img,['product/view','id'=>$model->product_id],['class'=>'featured_ico_link',  'title'=>$model->productImages[0]->title]);
            }
            else
            {
                $img = Html::img(
                        $model->getUrl('570x401'),
                        ['title'=>'placeholder', 'alt'=>'placeholder', 'width'=>570,  'height'=>401]).'<div class="featured_item_fadder"></div><span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>';
                echo Html::a($img,['product/view','id'=>$model->product_id],['class'=>'featured_ico_link',  'title'=>'placeholder']);
            }

		?>
        </div>
    </div>
</div>