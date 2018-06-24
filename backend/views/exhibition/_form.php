<?php

//namespace backend\widgets;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Exhibition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exhibition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_from')->textInput() ?>

    <?= $form->field($model, 'date_to')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?= Html::a('Add Image', ['/exhibition-image/create', 'id' => $model->id], ['class'=>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php /*

    // usage without model
    echo '<label>Check Issue Date</label>';
    echo DatePicker::widget([
        'name' => 'check_issue_date',
        'value' => date('d-M-Y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'dd-M-yyyy',
            'todayHighlight' => true
        ]
    ]);
 */
    ?>

</div>
