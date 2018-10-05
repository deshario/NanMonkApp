<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RankSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rank-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rank_id') ?>

    <?= $form->field($model, 'rank_position') ?>

    <?= $form->field($model, 'rank_given_temple') ?>

    <?= $form->field($model, 'rank_given_date') ?>

    <?= $form->field($model, 'rank_temple_address') ?>

    <?php // echo $form->field($model, 'rank_type') ?>

    <?php // echo $form->field($model, 'rank_file') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
