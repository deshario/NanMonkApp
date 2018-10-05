<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\EducationLevel;

/* @var $this yii\web\View */
/* @var $model app\models\EducationLevel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-level-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'level_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level_type')->dropDownList([
        EducationLevel::EDU_SCHOOL => $model->getEducationLevel(EducationLevel::EDU_SCHOOL),
        EducationLevel::EDU_UNIVERSITY => $model->getEducationLevel(EducationLevel::EDU_UNIVERSITY),
        EducationLevel::EDU_DHAMMA => $model->getEducationLevel(EducationLevel::EDU_DHAMMA),
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
