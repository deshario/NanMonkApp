<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WoopasombodSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="woopasombod-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'woopasombod_id') ?>

    <?= $form->field($model, 'woopasombod_date') ?>

    <?= $form->field($model, 'woopasombod_temple') ?>

    <?= $form->field($model, 'woopasombod_address') ?>

    <?= $form->field($model, 'woopatcha_by') ?>

    <?php // echo $form->field($model, 'woopatcha_address') ?>

    <?php // echo $form->field($model, 'kammawajarn') ?>

    <?php // echo $form->field($model, 'kammawajarn_address') ?>

    <?php // echo $form->field($model, 'anutsawanajarn') ?>

    <?php // echo $form->field($model, 'anutsawanajarn_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
