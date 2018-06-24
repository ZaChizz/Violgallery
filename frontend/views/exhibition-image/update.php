<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ExhibitionImage */

$this->title = 'Update Exhibition Image: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Exhibition Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="exhibition-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
