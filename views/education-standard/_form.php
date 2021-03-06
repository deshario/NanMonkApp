<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EducationStandard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-standard-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'education_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
