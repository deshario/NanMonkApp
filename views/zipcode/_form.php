<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zipcode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zipcode-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ZIPCODE_ID')->textInput() ?>

    <?= $form->field($model, 'DISTRICT_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROVINCE_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AMPHUR_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DISTRICT_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ZIPCODE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
