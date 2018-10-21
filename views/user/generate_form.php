<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\range\RangeInput;

/* @var $this yii\web\View */
/* @var $model app\Models\Yii2User */

$this->title = 'สร้าง';
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">เพิ่มผู้ใช้งาน</h3>
        </div>
        <div class="box-body">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'no_users')->textInput(['type' => 'number']) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
