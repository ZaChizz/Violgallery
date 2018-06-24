<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
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
                                                        'id' => 'login-form',
                                                        'fieldConfig' => [
                                                            'template' => "{input}\n{hint}\n{error}",
                                                        ]
                                                    ]); ?>
                                                    <?= $form->field($model, 'username',['template' => '<div class="w50 pr7">{input}{error}{hint}</div>'])->textInput(['placeholder' => 'Name *']) ?>
                                                    <?= $form->field($model, 'password', ['template' => '<div class="w50">{input}{error}{hint}</div>'])->passwordInput(['placeholder' => 'password *']) ?>
                                                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                                                    <div style="color:#999;margin:1em 0">
                                                        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                                                    </div>
                                                    <?= Html::tag('input','login',['type'=>'submit', 'value'=>'Login']) ?>

                                                    <?php ActiveForm::end(); ?>
                                                </div>

                                            </div>
                                            <div>Don't have an Oyester Account yet? <?= Html::a('Create Account', ['site/signup']) ?></div>
                                        </div><!-- .module_cont -->
                                        <div class="span4 module_number_2 module_cont no_bg pb0 module_contact_info">
                                            <div class="bg_title"><h4 class="headInModule">Contact Information</h4></div>
                                            <ul class="contact_info_list contact_icons">
                                                <li class="contact_info_item">
                                                    <div class="contact_info_wrapper">
                                                        <span class="contact_info_icon"><i class="icon-home"></i></span>
                                                        <div class="contact_info_text">5512 Lorem Vestibulum 666/13</div>
                                                    </div>
                                                </li>
                                                <li class="contact_info_item">
                                                    <div class="contact_info_wrapper">
                                                        <span class="contact_info_icon"><i class="icon-phone"></i></span>
                                                        <div class="contact_info_text">+1 800 789 50 12</div>
                                                    </div>
                                                </li>
                                                <li class="contact_info_item">
                                                    <div class="contact_info_wrapper">
                                                        <span class="contact_info_icon"><i class="icon-envelope"></i></span>
                                                        <div class="contact_info_text"><a href="#">mail@oyster.com</a></div>
                                                    </div>
                                                </li>
                                                <li class="contact_info_item">
                                                    <div class="contact_info_wrapper">
                                                        <span class="contact_info_icon"><i class="icon-skype"></i></span>
                                                        <div class="contact_info_text">Skype</div>
                                                    </div>
                                                </li>
                                                <li class="contact_info_item">
                                                    <div class="contact_info_wrapper">
                                                        <span class="contact_info_icon"><i class="icon-twitter"></i></span>
                                                        <div class="contact_info_text"><a href="#">Twitter</a></div>
                                                    </div>
                                                </li>
                                                <li class="contact_info_item">
                                                    <div class="contact_info_wrapper">
                                                        <span class="contact_info_icon"><i class="icon-facebook-square"></i></span>
                                                        <div class="contact_info_text"><a href="#">Facebook</a></div>
                                                    </div>
                                                </li>
                                                <li class="contact_info_item">
                                                    <div class="contact_info_wrapper">
                                                        <span class="contact_info_icon"><i class="icon-dribbble"></i></span>
                                                        <div class="contact_info_text"><a href="#">Dribbble</a></div>
                                                    </div>
                                                </li>
                                                <li class="contact_info_item">
                                                    <div class="contact_info_wrapper">
                                                        <span class="contact_info_icon"><i class="icon-flickr"></i></span>
                                                        <div class="contact_info_text"><a href="#">Flickr</a></div>
                                                    </div>
                                                </li>
                                                <li class="contact_info_item">
                                                    <div class="contact_info_wrapper">
                                                        <span class="contact_info_icon"><i class="icon-youtube-play"></i></span>
                                                        <div class="contact_info_text"><a href="#">YouTube</a></div>
                                                    </div>
                                                </li>
                                                <li class="contact_info_item">
                                                    <div class="contact_info_wrapper">
                                                        <span class="contact_info_icon"><i class="icon-pinterest"></i></span>
                                                        <div class="contact_info_text"><a href="#">Pinterest</a></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- .module_cont -->
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



