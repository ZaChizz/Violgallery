<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                Product view
            </div>
            <div class="panel-body">
    <p>
        <?= Html::a('Back to grid', ['index'], ['class' => 'btn btn-outline btn-success']) ?>
        <?= Html::a('Add Image', ['product-image/index', 'id' => $model->product_id], ['class' => 'btn btn-outline btn-info']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'template' => "<tr><th>{label}</th><td>{value}</button></td></tr>",
        'attributes' => [
            'product_id',
            'title',
            'like',
            'view',
            [
                'label' => 'Category',
                'value' =>''.$model->category->title,
            ],
            [
                'label' => 'Style',
                'value' => $model->style->title,
            ],
            [
                'label' => 'Genre',
                'value' => $model->genre->title,
            ],
            [
                'label' => 'Artist',
                'value' => $model->artist->name.' '.$model->artist->lastname,
            ],
            'description:ntext',
            'create_time:datetime',
            'update_time:datetime',
        ],
    ]) ?>

            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>