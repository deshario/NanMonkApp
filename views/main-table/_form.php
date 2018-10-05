<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MainTable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-table-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'current_id')->textInput() ?>

    <?= $form->field($model, 'banpacha_id')->textInput() ?>

    <?= $form->field($model, 'woopasombod_id')->textInput() ?>

    <?= $form->field($model, 'champhansa_id')->textInput() ?>

    <?= $form->field($model, 'education_id')->textInput() ?>

    <?= $form->field($model, 'rank_id')->textInput() ?>

    <?= $form->field($model, 'samanasak_id')->textInput() ?>

    <?= $form->field($model, 'training_id')->textInput() ?>

    <?= $form->field($model, 'talent_id')->textInput() ?>

    <?= $form->field($model, 'portfolio_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
