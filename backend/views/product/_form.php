<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;
use backend\models\Genre;
use backend\models\Style;
use backend\models\Artist;

/* @var $this yii\web\View */
/* @var $model backend\models\product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                Product Form
            </div>
            <div class="panel-body">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'home')->checkbox() ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'category_id')->dropDownList(
                    ArrayHelper::map(Category::find()->all(), 'category_id', 'title')) ?>

            <?= $form->field($model, 'genre_id')->dropDownList(
                ArrayHelper::map(Genre::find()->all(), 'id', 'title')) ?>

            <?= $form->field($model, 'style_id')->dropDownList(
                ArrayHelper::map(Style::find()->all(), 'id', 'title')) ?>

            <?= $form->field($model, 'artist_id')->dropDownList(
                ArrayHelper::map(Artist::find()->all(), 'artist_id', 'title')) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            <div class="row">
                <div class="col-lg-6">
            <?= $form->field($model, 'price_from')->textInput(['maxlength' => true]) ?>
                </div>
                    <div class="col-lg-6">
            <?= $form->field($model, 'price_to')->textInput(['maxlength' => true]) ?>
                </div>
                </div>
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
