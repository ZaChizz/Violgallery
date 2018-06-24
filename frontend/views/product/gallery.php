<?php
use yii\widgets\ListView;

$this->registerJs("$('body').on('click','.productlike',handleAjaxLink);", \yii\web\View::POS_READY);
?>

<div class="fullscreen_block hided">
	<?=$this->render('gallery/category',['categories'=>$categories])?>
	<div class="fs_blog_module image-grid">
	<?=
         ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => "{items}",
        'itemView' => 'gallery/product',
    ])
    ?>	
	</div>	
</div>
<?= \yii\widgets\LinkPager::widget([
    'pagination'=>$dataProvider->pagination,
    'options'=>['class'=>'pagerblock'],
    'prevPageLabel'=>false,
    'nextPageLabel'=>false,
]) ?>