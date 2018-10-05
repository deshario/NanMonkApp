<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChamphansaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="champhansa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'champhansa_id') ?>

    <?= $form->field($model, 'champhansa_temple') ?>

    <?= $form->field($model, 'champhansa_address') ?>

    <?= $form->field($model, 'champhansa_move_in') ?>

    <?= $form->field($model, 'champhansa_move_out') ?>

    <?php // echo $form->field($model, 'champhansa_duration') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
