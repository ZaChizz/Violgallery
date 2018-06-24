<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ExhibitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exhibitions';
$this->params['breadcrumbs'][] = Html::encode($this->title);
?>

<div class="strip_template">
    <figure class="strip-menu vertical" data-count="5">

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['tag' => false],
            'options'=>['class'=>'strip-menu vertical'],
            'itemView' => '_itemIndex',
            'layout' => '{items}',
        ]) ?>
    </figure>
</div>

