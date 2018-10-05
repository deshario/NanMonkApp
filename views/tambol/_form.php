<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tambol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tambol-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DISTRICT_ID')->textInput() ?>

    <?= $form->field($model, 'DISTRICT_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DISTRICT_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AMPHUR_ID')->textInput() ?>

    <?= $form->field($model, 'PROVINCE_ID')->textInput() ?>

    <?= $form->field($model, 'GEO_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
