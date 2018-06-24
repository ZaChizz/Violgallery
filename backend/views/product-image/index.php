<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\productImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                New Image
            </div>
            <div class="panel-body">
                
    <?php if ($searchModel->product_id) : ?>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

        <?= $form->field($uploadForm, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($uploadForm, 'files[]')->fileInput(['multiple' => true]) ?>

        <button class="btn btn-primary">Upload</button>

        <?php ActiveForm::end() ?>
    <?php endif ?>

            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Product Image Grid
                </div>
                <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'label' => 'Home',
                'contentOptions' => ['style' => 'width:60px;'],
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    if($model->home)
                        return '<button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-check"></i></button>';
                    else
                        return '<button type="button" class="btn btn-warning btn-circle btn-lg"><i class="fa fa-times"></i></button>';
                }
            ],
            [
                'label' => 'Thubnails',
                'contentOptions' => ['style' => 'width:100px;'],
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    /** @var $model common\models\Image */
                    return Html::img($model->getUrl('96x96'));
                }
            ],
            [
                'label' => 'Resolution',
                'format' => 'text',
                'value' => function ($model, $key, $index, $column) {
                    $field = json_decode($model->resolution, true);
                    return $field['width'].'/'.$field['height'];
                }
            ],



            'title',
            'id',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return \yii\helpers\Html::a('<div class="text-center"><em data-toggle="tooltip"
                                                            data-placement="top" title="Update"
                                                            class="fa fa-pencil-square text-warning"></em></div>',
                            (new yii\grid\ActionColumn())->createUrl('product-image/update', $model, $model['id'], 1), [
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
                            (new yii\grid\ActionColumn())->createUrl('product-image/delete', $model, $model['id'], 1), [
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

