<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Artist */

$this->title = 'Update Artist: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Artists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->artist_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="artist-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
