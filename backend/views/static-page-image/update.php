<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\StaticPageImage */

$this->title = $model->title;;
$this->params['breadcrumbs'][] = ['label' => 'Static Page Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="static-page-image-create">

    <?= $this->render('_form', [
        'model' => $model, 'uploadForm' => $uploadForm,
    ]) ?>

</div>
