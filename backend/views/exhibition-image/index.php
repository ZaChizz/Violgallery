<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExhibitionImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exhibition Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exhibition-image-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Exhibition Image', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'exhibition_id',
            'home',
            'resolution',
            // 'orientation',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
