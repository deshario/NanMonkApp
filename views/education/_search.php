<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EducationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'education_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'edu_school') ?>

    <?= $form->field($model, 'edu_university') ?>

    <?= $form->field($model, 'edu_dhamma') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
