<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Talent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="talent-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'talent_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
