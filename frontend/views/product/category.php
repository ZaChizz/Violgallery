<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use frontend\models\Prices;

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
use yii\widgets\ActiveForm;

/* @var $form yii\widgets\ActiveForm */
?>

<div class="optionset1">
    <ul>

    <?php $form = ActiveForm::begin(
        [
            'method' => 'post'
        ]
    ); ?>
        <li>
    <?= $form->field($searchModel, 'price_from')->dropDownList(
        ArrayHelper::map(Prices::find()->all(), 'title', 'title')) ?>
        </li>
        <li>
    <?= $form->field($searchModel, 'price_to')->dropDownList(
        ArrayHelper::map(Prices::find()->all(), 'title', 'title')) ?>
        </li>
        <li>
            <?= Html::submitButton('Apply', ['class' => 'btn btn-success']) ?>
        </li>


    <?php ActiveForm::end(); ?>

    </ul>
</div>


<div class="portfolio_block image-grid columns4 portf_columns">
	<?= ListView::widget([
		'dataProvider' => $dataProvider,
		'itemOptions' => ['class' => 'item'],
		'layout' => "{items}\n",
		'itemView' => '_categoryItems',
		])
	?>
	<div class="clear"></div>
</div>
	<?= \yii\widgets\LinkPager::widget([
		'pagination'=>$dataProvider->pagination,
		'options'=>['class'=>'pagerblock'],
		'prevPageLabel'=>false,
		'nextPageLabel'=>false,			
		]) ?>


