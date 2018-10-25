<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpecialworkTrans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="specialwork-trans-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6">
        <?= $form->field($model, 'idperson')->textInput(['maxlength' => true, 'readonly' => true]) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'idwork')->dropDownList($model->getSpecialworkList(), ['prompt' => 'กรุณาเลือกประเภทผลงาน']) ?>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
