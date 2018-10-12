<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PromotionTransSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promotion-trans-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpos') ?>

    <?= $form->field($model, 'idperson') ?>

    <?= $form->field($model, 'idpromotion') ?>

    <?= $form->field($model, 'promotiondate') ?>

    <?= $form->field($model, 'place1') ?>

    <?php // echo $form->field($model, 'place2') ?>

    <?php // echo $form->field($model, 'temple') ?>

    <?php // echo $form->field($model, 'temple_address') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'attachfile') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
