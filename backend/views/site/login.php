<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Please Sign In';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <fieldset>
                    <div class="form-group">
                        <?= Html::activeInput('text', $model, 'username',['placeholder'=>'Username *', 'class'=>'form-control']) ?>
                    </div>
                    <div class="form-group">
                        <?= Html::activeInput('password', $model, 'password',['placeholder'=>'Password *', 'class'=>'form-control']) ?>
                    </div>
                    <div class="checkbox">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>
                    <?= Html::tag('input','login',['type'=>'submit', 'value'=>'Login','class'=>'btn btn-lg btn-success btn-block']) ?>

                </fieldset>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
