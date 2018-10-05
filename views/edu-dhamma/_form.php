<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EduDhamma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-dhamma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dhamma_id')->textInput() ?>

    <?= $form->field($model, 'dhamma_temple')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education_level')->textInput() ?>

    <?= $form->field($model, 'dhamma_temple_address')->textInput() ?>

    <?= $form->field($model, 'dhamma_transcript')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
