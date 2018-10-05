<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EduDhammaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-dhamma-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dhamma_id') ?>

    <?= $form->field($model, 'dhamma_temple') ?>

    <?= $form->field($model, 'education_level') ?>

    <?= $form->field($model, 'dhamma_temple_address') ?>

    <?= $form->field($model, 'dhamma_transcript') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
