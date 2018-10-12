<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingTrans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-trans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idperson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'training_id')->textInput() ?>

    <?= $form->field($model, 'trainingdate')->textInput() ?>

    <?= $form->field($model, 'trainingby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'others')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachfile')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
