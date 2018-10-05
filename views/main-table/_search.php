<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MainTableSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-table-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'main_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'current_id') ?>

    <?= $form->field($model, 'banpacha_id') ?>

    <?= $form->field($model, 'woopasombod_id') ?>

    <?php // echo $form->field($model, 'champhansa_id') ?>

    <?php // echo $form->field($model, 'education_id') ?>

    <?php // echo $form->field($model, 'rank_id') ?>

    <?php // echo $form->field($model, 'samanasak_id') ?>

    <?php // echo $form->field($model, 'training_id') ?>

    <?php // echo $form->field($model, 'talent_id') ?>

    <?php // echo $form->field($model, 'portfolio_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
