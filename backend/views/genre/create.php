<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Genre */

$this->title = 'Create Genre';
$this->params['breadcrumbs'][] = ['label' => 'Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

