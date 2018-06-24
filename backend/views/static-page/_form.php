<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\staticPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="static-page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?= Html::a('Change Image', ['/static-page-image/update', 'id' => $model->staticPageImages[0]->id], ['class'=>'btn btn-success']) ?>

        <?= Html::a('Change Background', ['/static-page-image/background', 'id' => $model->id], ['class'=>'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
