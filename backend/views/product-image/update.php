<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\productImage */

$this->title = 'Update Product Image: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Product Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-image-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
