<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Genre */

$this->title = 'Update Genre: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


