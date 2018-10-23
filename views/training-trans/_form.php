<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use karatae99\datepicker\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingTrans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-trans-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4">
        <?= $form->field($model, 'idperson')->textInput(['maxlength' => true, 'readonly' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'training_id')->dropDownList($model->getTrainingList(), ['prompt' => 'กรุณาเลือกการอบรม']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'trainingdate')->widget(
            DatePicker::className(), [
            'language' => 'th', // Thai B.E.
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);?>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-4">
        <?= $form->field($model, 'trainingby')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-8">
        <?= $form->field($model, 'others')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'attachfile')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*', 'multiple' => false],
            'pluginOptions' => [
                'previewFileType' => 'image',
                'allowedFileExtensions' => ['jpg', 'jpeg', 'png', 'pdf'],
                'showPreview' => false,
                'showCaption' => true,
                'showRemove' => true,
                'showUpload' => false,
                'initialPreview' => [
                    //$model->person_pic ? $imgpath : null, // checks the models to display the preview
                ],
                'overwriteInitial' => false,
            ]
        ]);
        ?>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
