<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PositionTransSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="position-trans-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpos') ?>

    <?= $form->field($model, 'idperson') ?>

    <?= $form->field($model, 'position_id') ?>

    <?= $form->field($model, 'positiondate') ?>

    <?= $form->field($model, 'temple') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'attachfile') ?>

    <?php // echo $form->field($model, 'address_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
