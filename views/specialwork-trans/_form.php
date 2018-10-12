<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpecialworkTrans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="specialwork-trans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idperson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idwork')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
