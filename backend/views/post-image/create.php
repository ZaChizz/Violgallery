<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PostImage */

$this->title = 'Create Post Image';
$this->params['breadcrumbs'][] = ['label' => 'Post Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
