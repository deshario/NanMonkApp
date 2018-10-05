<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rank-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rank_position')->textInput() ?>

    <?= $form->field($model, 'rank_given_temple')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rank_given_date')->textInput() ?>

    <?= $form->field($model, 'rank_temple_address')->textInput() ?>

    <?= $form->field($model, 'rank_type')->textInput() ?>

    <?= $form->field($model, 'rank_file')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
