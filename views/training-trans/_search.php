<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingTransSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-trans-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idperson') ?>

    <?= $form->field($model, 'training_id') ?>

    <?= $form->field($model, 'trainingdate') ?>

    <?= $form->field($model, 'trainingby') ?>

    <?php // echo $form->field($model, 'others') ?>

    <?php // echo $form->field($model, 'attachfile') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
