<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('body').on('click','.productlike',handleAjaxLink);", \yii\web\View::POS_READY);
?>
<div class="posts-block hasLS">
    <div class="page_title_block">
        <h1 class="title">Welcome to Our Blog</h1>
    </div>
    <div class="contentarea">
        <div class="row">
            <div class="span12 first-module module_number_1 module_cont pb20 module_text_area">
                <div class="module_content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce lacinia sed purus at molestie duis pulvinar ac vehicula felis, non aliquet arcu apibus eget. Maecenas nibh enim, vulputate a malesuada eu.</p>
                </div>
            </div><!-- .module_cont -->
        </div>
        <div class="row">
            <div class="span12 module_number_2 module_cont pb0 module_blog">
                <?= ListView::widget([
						'dataProvider' => $dataProvider,
						'itemOptions' => ['class' => 'item'],
						'layout' => "{items}\n",
						'itemView' => '_blogItems',
					])
				?>
				<?= \yii\widgets\LinkPager::widget([
					'pagination'=>$dataProvider->pagination,
					'options'=>['class'=>'pagerblock'],
					'prevPageLabel'=>false,
					'nextPageLabel'=>false,
					
				]) ?>
            </div>
		 </div>
	</div>
</div>