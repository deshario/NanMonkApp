<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EducationTransSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-trans-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idedu') ?>

    <?= $form->field($model, 'idperson') ?>

    <?= $form->field($model, 'education_level') ?>

    <?= $form->field($model, 'place') ?>

    <?= $form->field($model, 'major') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'abbrev') ?>

    <?php // echo $form->field($model, 'transcriptname') ?>

    <?php // echo $form->field($model, 'attachfile') ?>

    <?php // echo $form->field($model, 'address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
