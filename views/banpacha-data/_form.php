<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BanpachaData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banpacha-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'banpacha_temple')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'banpacha_date')->textInput() ?>

    <?= $form->field($model, 'banpacha_address')->textInput() ?>

    <?= $form->field($model, 'woopatcha_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'woopatcha_temple')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'woopatcha_address')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
