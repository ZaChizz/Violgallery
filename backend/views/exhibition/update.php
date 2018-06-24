<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Exhibition */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Exhibitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                Exhibition Form
            </div>
            <div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                Exhibition Image
            </div>
            <div class="panel-body">
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
                return Html::img($model->getUrl('96x96'));
            }
        ],
        'title',
        'resolution',
        // 'orientation',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return \yii\helpers\Html::a('<div class="text-center"><em data-toggle="tooltip"
                                                            data-placement="top" title="Update"
                                                            class="fa fa-pencil-square text-warning"></em></div>',
                        (new yii\grid\ActionColumn())->createUrl('exhibition-image/update', $model, $model['id'], 1), [
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
                        (new yii\grid\ActionColumn())->createUrl('exhibition-image/delete', $model, $model['id'], 1), [
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
