<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EducationTrans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-trans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idperson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education_level')->textInput() ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'major')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abbrev')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transcriptname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachfile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
