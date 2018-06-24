<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\staticPage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Static Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <?= $model->title ?>
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

