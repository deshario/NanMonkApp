<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HobbyTrans */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="hobby-trans-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6">
        <?= $form->field($model, 'idperson')->textInput(['maxlength' => true, 'readonly' => true]) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'idhobby')->dropDownList($model->getHobbyList(), ['prompt' => 'กรุณาเลือกชนิดของความสามารถพิเศษ']) ?>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'others')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
