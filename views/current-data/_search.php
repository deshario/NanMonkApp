<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CurrentDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="current-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'current_id') ?>

    <?= $form->field($model, 'citizen_no') ?>

    <?= $form->field($model, 'book_no') ?>

    <?= $form->field($model, 'current_name') ?>

    <?= $form->field($model, 'surname') ?>

    <?php // echo $form->field($model, 'cogname') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'phansa_year') ?>

    <?php // echo $form->field($model, 'wittayathana') ?>

    <?php // echo $form->field($model, 'temple') ?>

    <?php // echo $form->field($model, 'sect') ?>

    <?php // echo $form->field($model, 'career') ?>

    <?php // echo $form->field($model, 'national') ?>

    <?php // echo $form->field($model, 'father_name') ?>

    <?php // echo $form->field($model, 'mother_name') ?>

    <?php // echo $form->field($model, 'current_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
