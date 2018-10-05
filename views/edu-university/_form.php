<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EduUniversity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-university-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'university_id')->textInput() ?>

    <?= $form->field($model, 'university_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'university_level')->textInput() ?>

    <?= $form->field($model, 'university_address')->textInput() ?>

    <?= $form->field($model, 'university_transcript')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
