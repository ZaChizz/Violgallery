<ul class="item_list">
<?php
	foreach($relatedModel as $model)
		echo $this->render('product',['model'=>$model, 'relatedModel'=>$relatedModel]);
?>
</ul>