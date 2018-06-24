<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Create Static Page';
$this->params['breadcrumbs'][] = ['label' => 'Static Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
/* @var $this yii\web\View */
/* @var $model backend\models\ExhibitionImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exhibition-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exhibition_id')->textInput() ?>

    <?= $form->field($model, 'home')->textInput() ?>

    <?= $form->field($model, 'resolution')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orientation')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


