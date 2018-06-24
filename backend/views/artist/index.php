<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArtistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artists';
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
            'artist_id',
            'name',
            'lastname',
            'about:ntext',
           // 'image',
            // 'like',
            // 'view',


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><em data-toggle="tooltip"
                                                            data-placement="top" title="Update"
                                                            class="fa fa-pencil-square text-warning"></em></div>',
                            (new yii\grid\ActionColumn())->createUrl('artist/update', $model, $model['artist_id'], 1), [
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
                            (new yii\grid\ActionColumn())->createUrl('artist/delete', $model, $model['artist_id'], 1), [
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
