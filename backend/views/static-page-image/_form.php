<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StaticPageImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <?= $this->title ?>
            </div>
            <div class="panel-body">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                <?php if(isset($model->title)):?>
                <?= $form->field($uploadForm, 'title')->textInput(['maxlength' => true]) ?>
                <?php endif;?>
                <?= $form->field($uploadForm, 'files[]')->fileInput(['multiple' => true]) ?>

                <button class="btn btn-primary">Upload</button>

                <?php ActiveForm::end() ?>

            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>


