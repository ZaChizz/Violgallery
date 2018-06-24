<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CommentProduct */

$this->title = 'Create Comment Product';
$this->params['breadcrumbs'][] = ['label' => 'Comment Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
