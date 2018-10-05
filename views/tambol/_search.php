<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TambolSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tambol-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'DISTRICT_ID') ?>

    <?= $form->field($model, 'DISTRICT_CODE') ?>

    <?= $form->field($model, 'DISTRICT_NAME') ?>

    <?= $form->field($model, 'AMPHUR_ID') ?>

    <?= $form->field($model, 'PROVINCE_ID') ?>

    <?php // echo $form->field($model, 'GEO_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
