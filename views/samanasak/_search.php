<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SamanasakSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="samanasak-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'samanasak_id') ?>

    <?= $form->field($model, 'samanasak_level') ?>

    <?= $form->field($model, 'rachathinanam') ?>

    <?= $form->field($model, 'samanasak_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
