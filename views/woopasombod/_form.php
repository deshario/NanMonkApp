<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Woopasombod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="woopasombod-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'woopasombod_date')->textInput() ?>

    <?= $form->field($model, 'woopasombod_temple')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'woopasombod_address')->textInput() ?>

    <?= $form->field($model, 'woopatcha_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'woopatcha_address')->textInput() ?>

    <?= $form->field($model, 'kammawajarn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kammawajarn_address')->textInput() ?>

    <?= $form->field($model, 'anutsawanajarn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anutsawanajarn_address')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
