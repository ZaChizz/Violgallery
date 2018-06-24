<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExhibitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exhibitions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'label' => 'Thubnails',
                'contentOptions' => ['style' => 'width:100px;'],
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    /** @var $model common\models\Image */
                    return Html::img($model->getUrlCover('96x96'));
                }
            ],
            'title',
            'description:ntext',
            'date_from:datetime',
            'date_to:datetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><em data-toggle="tooltip"
                                                            data-placement="top" title="Update"
                                                            class="fa fa-pencil-square text-warning"></em></div>',
                            (new yii\grid\ActionColumn())->createUrl('exhibition/update', $model, $model['id'], 1), [
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
                            (new yii\grid\ActionColumn())->createUrl('exhibition/cover-image', $model, $model['id'], 1), [
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
