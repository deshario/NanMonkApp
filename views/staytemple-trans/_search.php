<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StaytempleTransSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staytemple-trans-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idstay') ?>

    <?= $form->field($model, 'idperson') ?>

    <?= $form->field($model, 'indate') ?>

    <?= $form->field($model, 'outdate') ?>

    <?= $form->field($model, 'staytemple') ?>

    <?php // echo $form->field($model, 'staytemple_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
