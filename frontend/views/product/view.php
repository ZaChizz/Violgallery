<?php


$this->registerJs("$('body').on('click','.productlike',handleAjaxLink);", \yii\web\View::POS_READY);

/* @var $this yii\web\View */
/* @var $model frontend\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="main_wrapper">
	<div class="content_wrapper">
		<div class="container simple-post-container">
			<div class="content_block no-sidebar row">
				<div class="fl-container ">
					<div class="row">
						<div class="posts-block simple-post">
							<div class="contentarea">
								<?=$this->render('view/singleProduct',['model'=>$model, 'recentModel'=>$recentModel])?>
								<hr class="single_hr">
								<?=$this->render('view/relatedWorks',['model'=>$model, 'relatedModel'=>$relatedModel])?>
								<hr class="single_hr">
								<?=$this->render('view/comments',['model'=>$model, 'commentModel'=>$commentModel])?>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div><!-- .fl-container -->
				<div class="clear"></div>
			</div>
		</div><!-- .container -->
	</div><!-- .content_wrapper -->
</div><!-- .main_wrapper -->

<footer>
	<?=$this->render('view/footer',['model'=>$model])?>
</footer>