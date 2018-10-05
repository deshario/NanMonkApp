<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Samanasak */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="samanasak-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'samanasak_level')->textInput() ?>

    <?= $form->field($model, 'rachathinanam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'samanasak_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
