<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 16.11.2015
 * Time: 11:15
 */
use yii\helpers\Html;
?>

<div class="strip-item strip_ver<?= $model->id ?>" data-href="about.html">
    <div class="mobile-hover"></div>
    <div class="strip-fadder"></div>
    <div class="strip-text">
        <h1 class="strip-title"><?= $model->title ?></h1>
    </div>
    <a href="about.html"></a>
    <?= Html::a('',['exhibition/view', 'id' => $model->id]) ?>
</div>