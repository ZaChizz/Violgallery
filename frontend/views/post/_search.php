<!--Tamplate

    <div class="header_search">
        <form name="search_form" method="get" action="#" class="search_form">
            <input type="text" name="s" value="" placeholder="Search the site..." class="field_search">
        </form>
    </div>

-->

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="header_search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class'=>'search_form'],
        'requiredCssClass' => 'field_search',
    ]); ?>

    <?= Html::activeInput('text',$model,'title',['class'=>'field_search', 'placeholder'=>'Search the site...']) ?>

    <?= Html::submitButton('Search', ['style' => 'display:none;']) ?>

    <?php ActiveForm::end(); ?>

</div>
