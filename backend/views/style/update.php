<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Style */

$this->title = 'Update Style: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Styles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

