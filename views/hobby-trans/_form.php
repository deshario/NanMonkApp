<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HobbyTrans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hobby-trans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idperson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idhobby')->textInput() ?>

    <?= $form->field($model, 'others')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
