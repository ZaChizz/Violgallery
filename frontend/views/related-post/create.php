<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\RelatedPost */

$this->title = 'Create Related Post';
$this->params['breadcrumbs'][] = ['label' => 'Related Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="related-post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
