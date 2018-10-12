<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MonkhoodMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monkhood-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'monkhood_id') ?>

    <?= $form->field($model, 'idperson') ?>

    <?= $form->field($model, 'childmonkage') ?>

    <?= $form->field($model, 'childmonkdate') ?>

    <?= $form->field($model, 'childmonk_temple') ?>

    <?php // echo $form->field($model, 'childmonk_address') ?>

    <?php // echo $form->field($model, 'childmonk_t1_name') ?>

    <?php // echo $form->field($model, 'childmonk_t1_temple') ?>

    <?php // echo $form->field($model, 'childmonk_t1_address') ?>

    <?php // echo $form->field($model, 'monk_age') ?>

    <?php // echo $form->field($model, 'monk_date') ?>

    <?php // echo $form->field($model, 'monk_time') ?>

    <?php // echo $form->field($model, 'monk_temple') ?>

    <?php // echo $form->field($model, 'monk_address') ?>

    <?php // echo $form->field($model, 'monk_t1_name') ?>

    <?php // echo $form->field($model, 'monk_t1_temple') ?>

    <?php // echo $form->field($model, 'monk_t1_address') ?>

    <?php // echo $form->field($model, 'monk_t2_name') ?>

    <?php // echo $form->field($model, 'monk_t2_temple') ?>

    <?php // echo $form->field($model, 'monk_t2_address') ?>

    <?php // echo $form->field($model, 'monk_t3_name') ?>

    <?php // echo $form->field($model, 'monk_t3_temple') ?>

    <?php // echo $form->field($model, 'monk_t3_address') ?>

    <?php // echo $form->field($model, 'staytemple') ?>

    <?php // echo $form->field($model, 'staymonkname') ?>

    <?php // echo $form->field($model, 'staymonk_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
