<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Province */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="province-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PROVINCE_ID')->textInput() ?>

    <?= $form->field($model, 'PROVINCE_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROVINCE_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GEO_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
