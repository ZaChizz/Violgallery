<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="fw_content_wrapper">
    <div class="fw_content_padding">
        <div class="content_wrapper noTitle">
            <div class="container">
                <div class="content_block row no-sidebar">
                    <div class="fl-container ">
                        <div class="row">
                            <div class="posts-block ">
                                <div class="contentarea">
                                    <div class="row">
                                        <div class="span8 first-module module_number_1 module_cont pb0 module_html">
                                            <div class="bg_title"><h4 class="headInModule">Get In Touch with Us</h4></div>
                                            <div class="module_content contact_form">
                                                <div id="note"></div>
                                                <div id="fields">
                                                    <?php $form = ActiveForm::begin([
                                                        'id' => 'form-signup',
                                                        'fieldConfig' => [
                                                            'template' => "{input}\n{hint}\n{error}",
                                                        ]
                                                    ]); ?>
                                                    <?= $form->field($model, 'username',['template' => '<div class="w50 pr7">{input}{error}{hint}</div>'])->textInput(['placeholder' => 'Name *']) ?>
                                                    <?= $form->field($model, 'email', ['template' => '<div class="w50 pr7">{input}{error}{hint}</div>'])->textInput(['placeholder' => 'Email *']) ?>
                                                    <?= $form->field($model, 'password', ['template' => '<div class="w50 pr7">{input}{error}{hint}</div>'])->passwordInput(['placeholder' => 'Password *']) ?>
                                                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                                        'template' => '<div class="w30 pr7">{image}{input}</div>',
                                                    ]) ?>
                                                    <?= Html::tag('input','signup',['type'=>'submit', 'value'=>'signup']) ?>

                                                    <?php ActiveForm::end(); ?>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- .module_cont -->
                                        <?php echo $this->render('modules/contact'); ?>
                                        <!-- .module_cont -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
