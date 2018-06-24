<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="span8 first-module module_number_1 module_cont pb0 module_text_area">
    <div class="bg_title"><h2 class="headInModule"><?= Html::encode($this->title) ?></h2></div>
    <div class="module_content">
        <p><?= Html::encode($model->body) ?></p>

    </div>
</div><!-- .module_cont -->

<div class="span4 module_number_2 module_cont pb0 module_text_area">
    <div class="module_content">
        <p><?= Html::img($model->staticPageImages[0]->getUrl('460x')) ?></p>
    </div>
</div><!-- .module_cont -->
