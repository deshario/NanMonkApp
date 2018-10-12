<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MovetempleTrans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movetemple-trans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idperson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fromdate')->textInput() ?>

    <?= $form->field($model, 'fromtemple')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
