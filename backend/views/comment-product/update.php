<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CommentProduct */

$this->title = 'Update Comment Product: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comment Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comment-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
