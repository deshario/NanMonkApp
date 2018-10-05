<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Amphur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="amphur-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'AMPHUR_ID')->textInput() ?>

    <?= $form->field($model, 'AMPHUR_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AMPHUR_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GEO_ID')->textInput() ?>

    <?= $form->field($model, 'PROVINCE_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
