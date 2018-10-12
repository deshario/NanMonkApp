<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idperson') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'person_book_no') ?>

    <?= $form->field($model, 'person_pic') ?>

    <?= $form->field($model, 'firstname') ?>

    <?php // echo $form->field($model, 'surname') ?>

    <?php // echo $form->field($model, 'aliasname') ?>

    <?php // echo $form->field($model, 'birthdate') ?>

    <?php // echo $form->field($model, 'staytemp') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'temple') ?>

    <?php // echo $form->field($model, 'homeno') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'section') ?>

    <?php // echo $form->field($model, 'idnationality') ?>

    <?php // echo $form->field($model, 'occupation') ?>

    <?php // echo $form->field($model, 'quality') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'special') ?>

    <?php // echo $form->field($model, 'father') ?>

    <?php // echo $form->field($model, 'mother') ?>

    <?php // echo $form->field($model, 'family_homeno') ?>

    <?php // echo $form->field($model, 'family_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
