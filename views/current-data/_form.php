<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Province;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\CurrentData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="current-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'citizen_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'book_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'current_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'cogname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'birthday')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter birth date ...'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy/mm/dd'
                ]
            ]); ?>

        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'phansa_year')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'wittayathana')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'temple')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'sect')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'career')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'national')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'homeno')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'province')->dropdownList(
                ArrayHelper::map(Province::find()->all(),
                    'PROVINCE_ID',
                    'PROVINCE_NAME'),
                [
                    'id' => 'ddl-province',
                    'prompt' => 'เลือกจังหวัด'
                ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'amphur')->widget(DepDrop::classname(), [
                'options' => ['id' => 'ddl-amphur'],
                'data' => [],
                'pluginOptions' => [
                    'depends' => ['ddl-province'],
                    'placeholder' => 'เลือกอำเภอ...',
                    'url' => Url::to(['/current-data/getamphur'])
                ]
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tambol')->widget(DepDrop::classname(), [
                'data' => [],
                'pluginOptions' => [
                    'depends' => ['ddl-province', 'ddl-amphur'],
                    'placeholder' => 'เลือกตำบล...',
                    'url' => Url::to(['/current-data/getdistrict'])
                ]
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
