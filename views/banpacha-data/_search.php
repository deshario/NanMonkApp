<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BanpachaDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banpacha-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'banpacha_id') ?>

    <?= $form->field($model, 'banpacha_temple') ?>

    <?= $form->field($model, 'banpacha_date') ?>

    <?= $form->field($model, 'banpacha_address') ?>

    <?= $form->field($model, 'woopatcha_by') ?>

    <?php // echo $form->field($model, 'woopatcha_temple') ?>

    <?php // echo $form->field($model, 'woopatcha_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
