<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Exhibition */

$this->title = 'Create Exhibition';
$this->params['breadcrumbs'][] = ['label' => 'Exhibitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exhibition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
