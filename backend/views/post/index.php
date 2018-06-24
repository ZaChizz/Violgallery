<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <div class="panel-body">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class'=>'dataTable_wrapper'],
        'rowOptions' => [''],
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'columns' => [

            'title',
            'preview_content:ntext',
            'tags:ntext',
            [
                'attribute' => 'comment',
                'value' => function ($model, $key, $index, $column) {
                    if($model->comment)
                    /* @var common\models\Action $model */
                        return Html::a($model->comment, ['/comment/post', 'id' => $model->id]);
                    else
                        return Html::a($model->comment, ['/comment/post', 'id' => $model->id],['style'=>'pointer-events: none;']);

                },
                'format' =>'raw',
            ],
            [
                'attribute' => 'author',
                'value' => 'author.username'
            ],
            // 'likes',
            // 'status',
            // 'typeView',
            'id',
             'create_time:datetime',
             'update_time:datetime',
            // 'author_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><em data-toggle="tooltip"
                                                            data-placement="top" title="More detail"
                                                            class="fa fa-eye"></em></div>',
                            (new yii\grid\ActionColumn())->createUrl('post/view', $model, $model['id'], 1), [
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
                            (new yii\grid\ActionColumn())->createUrl('post-image/index', $model, $model['id'], 1), [
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
                            (new yii\grid\ActionColumn())->createUrl('post/update', $model, $model['id'], 1), [
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
                            (new yii\grid\ActionColumn())->createUrl('post/delete', $model, $model['id'], 1), [
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
