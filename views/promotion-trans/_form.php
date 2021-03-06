<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use karatae99\datepicker\DatePicker;
use kartik\file\FileInput;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use app\models\Province;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PromotionTrans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promotion-trans-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4">
        <?= $form->field($model, 'idperson')->textInput(['maxlength' => true, 'readonly' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'idpromotion')->dropDownList($model->getPromotionList(), ['prompt' => 'กรุณาเลือกระดับตำแหน่งสมณศักดิ์']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'promotiondate')->widget(
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
        <?= $form->field($model, 'place1')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'place2')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'temple')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-4">
        <?= $form->field($model, 'province')->dropdownList(
            ArrayHelper::map(Province::find()
                ->orderBy('PROVINCE_NAME')
                ->all(),
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
            'data' =>$district,
            'pluginOptions' => [
                'depends' => ['ddl-province', 'ddl-amphur'],
                'placeholder' => 'เลือกตำบล...',
                'url' => Url::to(['/person-master/getdistrict'])
            ]
        ]); ?>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-4">
        <?= $form->field($model, 'year')->widget(
            DatePicker::className(), [
            'language' => 'th', // Thai B.E.
            'clientOptions' => [
                'startView' => 'year',
                'minViewMode' => 1,
                'autoclose' => true,
                'format' => 'yyyy',
            ]
        ]);?>
    </div>

    <div class="col-md-8">
        <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12">
        <?= $form->field($model, 'attachfile')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*', 'multiple' => false],
            'pluginOptions' => [
                'previewFileType' => 'image',
                'allowedFileExtensions' => ['jpg', 'jpeg', 'png', 'pdf'],
                'showPreview' => true,
                'showCaption' => true,
                'showRemove' => true,
                'showUpload' => false,
                'initialPreview'=>$model->initialPreview($model->attachfile),
                'overwriteInitial' => false,
            ],
        ]);
        ?>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
