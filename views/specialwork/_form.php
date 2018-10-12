<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Specialwork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="specialwork-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'worktype')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
