<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <div class="panel-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'label' => 'Image isset',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    if(isset($model->productImages[0]->home))
                        return '<button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-check"></i></button>';
                    else
                        return '<button type="button" class="btn btn-warning btn-circle btn-lg"><i class="fa fa-times"></i></button>';
                }
            ],
            'title',
            'like',
            'view',
            [
                'attribute' => 'category_id',
                'label' => 'Category',
                'value' => function ($model, $key, $index, $column) {
                    /* @var common\models\Action $model */
                    return Html::a($model->category->title, ['/category/view', 'category_id' => $model->category->category_id]);
                },
                'format' =>'raw',
                'filter' => ArrayHelper::map(Category::find()->all(), 'category_id', 'title')
            ],

            // 'artist_id',
            // 'home',
            // 'gallery',
            [
                'attribute' => 'artist',
                'value' => 'artist.name'
            ],
            [
                'attribute' => 'comment',
                'value' => function ($model, $key, $index, $column) {
                    if($model->comment)
                        /* @var common\models\Action $model */
                        return Html::a($model->comment, ['/comment-product/post', 'id' => $model->product_id]);
                    else
                        return Html::a($model->comment, ['/comment-product/post', 'id' => $model->product_id],['style'=>'pointer-events: none;']);

                },
                'format' =>'raw',
            ],
            'product_id',
            // 'image',
            // 'description:ntext',
             'create_time:datetime',
             'update_time:datetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><em data-toggle="tooltip"
                                                            data-placement="top" title="More detail"
                                                            class="fa fa-eye"></em></div>',
                            (new yii\grid\ActionColumn())->createUrl('product/view', $model, $model['product_id'], 1), [
                                'title' => Yii::t('yii', 'view'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]);
                    },
                ]
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><em data-toggle="tooltip"
                                                            data-placement="top" title="Update"
                                                            class="fa fa-image text-muted"></em></div>',
                            (new yii\grid\ActionColumn())->createUrl('product-image/index', $model, $model['product_id'], 1), [
                                'title' => Yii::t('yii', 'view'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]);
                    },
                ]
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><em data-toggle="tooltip"
                                                            data-placement="top" title="Update"
                                                            class="fa fa-pencil-square text-warning"></em></div>',
                            (new yii\grid\ActionColumn())->createUrl('product/update', $model, $model['product_id'], 1), [
                                'title' => Yii::t('yii', 'view'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]);
                    },
                ]
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><em data-toggle="tooltip"
                                                            data-placement="top" title="Delete"
                                                            class="fa fa-trash text-danger"></em></div>',
                            (new yii\grid\ActionColumn())->createUrl('product/delete', $model, $model['product_id'], 1), [
                                'title' => Yii::t('yii', 'view'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]);
                    },
                ]
            ],

        ],
    ]); ?>

</div>
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>