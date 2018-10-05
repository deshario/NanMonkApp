<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EduSchool */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-school-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'school_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_level')->textInput() ?>

    <?= $form->field($model, 'school_address')->textInput() ?>

    <?= $form->field($model, 'school_transcript')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
