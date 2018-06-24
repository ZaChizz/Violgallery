<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ExhibitionImage */

$this->title = 'Create Exhibition Image';
$this->params['breadcrumbs'][] = ['label' => 'Exhibition Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exhibition-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
