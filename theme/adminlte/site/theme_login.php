<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

$this->title = 'เข้าสู่ระบบ';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#" style="color: #ffffff"><b>เข้าสู่ระบบ</b></a>
    </div>
    <!-- /.login-logo -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
        <div class="panel-body">

           <!--  <?= $form
                ->field($model, 'username', $fieldOptions1)
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('username'),'maxlength' => 8]) ?>

            <?= $form
                ->field($model, 'password', $fieldOptions2)
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

            -->
            <?= $form->field($model, 'username')->textInput(
                    [   'autofocus' => true,
                        'placeholder' => $model->getAttributeLabel('username'),
                        'maxlength' => 8
                    ]) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

          <!--   <div class="row">
                <div class="col-md-8">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    <a href="#" class="btn btn-default btn-xs">Forgot password</a>
                </div>
            </div> -->

            <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-default btn-block', 'name' => 'login-button']) ?>

        </div>
        <?php ActiveForm::end(); ?>
    </div>

    <!-- /.login-box-body -->
</div><!-- /.login-box -->
