<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\date\DatePicker;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Province;
use kartik\color\ColorInput;

$imgpath = Html::img(Yii::getAlias('@web').'/uploads/avatars/'.$model->person_pic,['class'=>'img-responsive']);

?>

<div class="person-master-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']]); // important
    ?>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">ข้อมูลปัจจุบัน</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php if($model->isNewRecord){?>
                <div class="col-md-12">
                    <?= $form->field($model, 'person_pic')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*', 'multiple' => false],
                        'pluginOptions' => [
                            'previewFileType' => 'image',
                            'allowedFileExtensions' => ['jpg', 'jpeg', 'png'],
                            'showPreview' => true,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false,
                            'initialPreview' => [
                                $model->person_pic ? $imgpath : null, // checks the models to display the preview
                            ],
                            'overwriteInitial' => false,
                        ]
                    ]);
                    ?>
                </div>
                <?php } ?>

                <div class="col-md-6">
                    <?= $form->field($model, 'idperson')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'person_book_no')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'aliasname')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'birthdate')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Enter birth date ...'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]); ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'staytemp')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'level')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-4">
                    <?= $form->field($model, 'temple')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'section')->textInput(['maxlength' => true]) ?>
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
                            'url' => Url::to(['/person-master/getamphur'])
                        ]
                    ]); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'tambol')->widget(DepDrop::classname(), [
                        'data' => [],
                        'pluginOptions' => [
                            'depends' => ['ddl-province', 'ddl-amphur'],
                            'placeholder' => 'เลือกตำบล...',
                            'url' => Url::to(['/person-master/getdistrict'])
                        ]
                    ]); ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'idnationality')->dropDownList($model->getNationalityLists(), ['prompt' => 'เลือกสัญชาติ'])?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'quality')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'color')->widget(ColorInput::classname(), [
                        'options' => ['placeholder' => 'Select color ...'],
                    ]);
                    ?>
                </div>

                <div class="col-md-8">
                    <?= $form->field($model, 'special')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-4">
                    <?= $form->field($model, 'father')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'mother')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'family_homeno')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'province_phumlamnao')->dropdownList(
                        ArrayHelper::map(Province::find()->all(),
                            'PROVINCE_ID',
                            'PROVINCE_NAME'),
                        [
                            'id' => 'ddl-province-phumlamnao',
                            'prompt' => 'เลือกจังหวัด'
                        ]); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'amphur_phumlamnao')->widget(DepDrop::classname(), [
                        'options' => ['id' => 'ddl-amphur-phumlamnao'],
                        'data' => [],
                        'pluginOptions' => [
                            'depends' => ['ddl-province-phumlamnao'],
                            'placeholder' => 'เลือกอำเภอ...',
                            'url' => Url::to(['/person-master/getamphur'])
                        ]
                    ]); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'tambol_phumlamnao')->widget(DepDrop::classname(), [
                        'data' => [],
                        'pluginOptions' => [
                            'depends' => ['ddl-province-phumlamnao', 'ddl-amphur-phumlamnao'],
                            'placeholder' => 'เลือกตำบล...',
                            'url' => Url::to(['/person-master/getdistrict'])
                        ]
                    ]); ?>
                </div>

            </div><!-- /.box-body -->
        </div><!-- /.box -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
