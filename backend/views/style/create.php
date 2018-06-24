<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Style */

$this->title = 'Create Style';
$this->params['breadcrumbs'][] = ['label' => 'Styles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


