<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <div class="panel-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'username',
            [
                'label' => 'Role',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    if($model->authAssignment->item_name == 'admin')
                    {
                        $class = 'btn btn-danger';
                    }
                    elseif($model->authAssignment->item_name == 'user')
                    {
                        $class = 'btn btn-success';
                    }
                    elseif($model->authAssignment->item_name == 'author')
                    {
                        $class = 'btn btn-warning';
                    }
                    else
                    {
                        $class = 'btn btn-default';
                    }
                    return '<button type="button" class="'.$class.'">'.$model->authAssignment->item_name.'</button>';

                }
            ],
             'email:email',
         //    'status',
             'created_at:datetime',
             'updated_at:datetime',
             'profile:ntext',


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><em data-toggle="tooltip"
                                                            data-placement="top" title="Update"
                                                            class="fa fa-pencil-square text-warning"></em></div>',
                            (new yii\grid\ActionColumn())->createUrl('user/update', $model, $model['id'], 1), [
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
                            (new yii\grid\ActionColumn())->createUrl('user/delete', $model, $model['id'], 1), [
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
