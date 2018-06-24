<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page_title_block">
    <h1 class="title"><?= Html::encode($this->title) ?></h1>
</div>


<div class="contentarea">
    <div class="row">
        <div class="span12 first-module module_number_1 module_cont pb35 module_text_area">
            <div class="module_content">
                <p>Get maecenas nibh enim, vulputate ac malesuada eu tincidunt non neque. Proin ut vulputate dui a lorem pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis es egestas. Fusce vestibulum venenatis tempus. Vivamus imperdiet lorem nulla, a nec sodales arcu iaculis vitae nam sem&nbsp;maecenas nibh enim, vulputate ac malesuada eu tincidunt non.</p>
            </div>
        </div><!-- .module_cont -->
    </div>

    <div class="row">
        <div class="span9 module_number_2 module_cont pb50 module_html">
            <div class="module_content contact_form">
                <div id="note"></div>
                <div id="fields">
                    <?php $form = ActiveForm::begin([
                        'id' => 'contact-form',
                        'fieldConfig' => [
                            'template' => "{input}\n{hint}\n{error}",
                        ]
                    ]); ?>
                    <?= $form->field($model, 'name',['template' => '<div class="w50 pr7">{input}{error}{hint}</div>'])->textInput(['placeholder' => 'Name *']) ?>
                    <?= $form->field($model, 'email', ['template' => '<div class="w50">{input}{error}{hint}</div>'])->textInput(['placeholder' => 'Email *']) ?>
                    <div class="clear"></div>
                    <?= $form->field($model, 'subject', ['template' => '<div>{input}{error}{hint}</div>'])->textInput(['placeholder' => 'Subject*']) ?>
                    <?= $form->field($model, 'body')->textArea(['rows' => 6, 'placeholder' => 'Message *']) ?>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="w30 pr7">{image}{input}</div>',
                    ]) ?>
                    <?= Html::tag('input','Send a message',['type'=>'submit', 'value'=>'Send a message']) ?>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <!-- .module_cont -->
        <?php echo $this->render('modules/contact'); ?>
        <!-- .module_cont -->
    </div>

    <div class="row">
        <div class="span12 module_number_4 module_cont pb0 module_google_map">
            <div class="module_content">
                <div id="map-canvas" class="map-canvas h500"></div>
            </div>
        </div><!-- .module_cont -->
    </div>

</div>
