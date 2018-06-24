<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\productImage */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update
            </div>
            <div class="panel-body">
    <div class="form-group field-productimage-home">
        <?= Html::img($model->getUrl('96x96')); ?>
    </div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'home')->textInput(['maxlength' => true])->checkbox() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
