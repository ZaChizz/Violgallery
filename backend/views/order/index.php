<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
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
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'product_id',
                    'message:ntext',
                    'status',
                    'create_time:datetime',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return \yii\helpers\Html::a('<div class="text-center"><em data-toggle="tooltip"
                                                            data-placement="top" title="More detail"
                                                            class="fa fa-eye"></em></div>',
                                    (new yii\grid\ActionColumn())->createUrl('order/view', $model, $model['artist_id'], 1), [
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
                                    (new yii\grid\ActionColumn())->createUrl('order/update', $model, $model['artist_id'], 1), [
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
                                    (new yii\grid\ActionColumn())->createUrl('order/delete', $model, $model['artist_id'], 1), [
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
