<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Education */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'edu_school')->textInput() ?>

    <?= $form->field($model, 'edu_university')->textInput() ?>

    <?= $form->field($model, 'edu_dhamma')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
