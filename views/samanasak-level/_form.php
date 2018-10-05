<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SamanasakLevel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="samanasak-level-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'samanasak_level_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
