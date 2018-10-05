<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EduSchoolSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-school-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'school_id') ?>

    <?= $form->field($model, 'school_name') ?>

    <?= $form->field($model, 'school_level') ?>

    <?= $form->field($model, 'school_address') ?>

    <?= $form->field($model, 'school_transcript') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
