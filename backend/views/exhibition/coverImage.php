<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 02.02.2016
 * Time: 16:38
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\productImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cover Images';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
Cover Image
            </div>
            <div class="panel-body">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($uploadForm, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($uploadForm, 'files[]')->fileInput(['multiple' => true]) ?>

    <button class="btn btn-primary">Upload</button>

    <?php ActiveForm::end() ?>

</div>
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>