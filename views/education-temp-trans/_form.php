<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Province;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\EducationTempTrans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-temp-trans-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']]);
    ?>

    <div class="col-md-4">
        <?= $form->field($model, 'idperson')->textInput(['maxlength' => true, 'readonly' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'education_level')->dropDownList($model->getEducationDhammaList(), ['prompt' => 'กรุณาเลือกระดับการศึกษา']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'temple')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'placeprovince')->dropdownList(
            ArrayHelper::map(Province::find()->all(),
                'PROVINCE_ID',
                'PROVINCE_NAME'),
            [
                'id' => 'ddl-placeprovince',
                'prompt' => 'เลือกจังหวัด'
            ]); ?>
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
            'data'=> $amphur,
            'pluginOptions' => [
                'depends' => ['ddl-province'],
                'placeholder' => 'เลือกอำเภอ...',
                'url' => Url::to(['/person-master/getamphur'])
            ]
        ]); ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'tambol')->widget(DepDrop::classname(), [
            'data' => $district,
            'pluginOptions' => [
                'depends' => ['ddl-province', 'ddl-amphur'],
                'placeholder' => 'เลือกตำบล...',
                'url' => Url::to(['/person-master/getdistrict'])
            ]
        ]); ?>
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
