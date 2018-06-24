<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RelatedPost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="related-post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_post')->textInput() ?>

    <?= $form->field($model, 'related_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
