<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PromotionTrans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promotion-trans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idperson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idpromotion')->textInput() ?>

    <?= $form->field($model, 'promotiondate')->textInput() ?>

    <?= $form->field($model, 'place1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'place2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'temple')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'temple_address')->textInput() ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachfile')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
