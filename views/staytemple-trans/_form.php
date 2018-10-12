<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StaytempleTrans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staytemple-trans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idperson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indate')->textInput() ?>

    <?= $form->field($model, 'outdate')->textInput() ?>

    <?= $form->field($model, 'staytemple')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staytemple_address')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
