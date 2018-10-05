<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EduUniversitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-university-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'university_id') ?>

    <?= $form->field($model, 'university_name') ?>

    <?= $form->field($model, 'university_level') ?>

    <?= $form->field($model, 'university_address') ?>

    <?= $form->field($model, 'university_transcript') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
