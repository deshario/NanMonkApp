<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Province;

$this->registerCss("
  
");

?>

<div class="monkhood-master-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">การบรรพชาอุปสมบท</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="col-md-4">
                <?= $form->field($model, 'idperson')->textInput(['maxlength' => true, 'readonly' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'childmonkage')->textInput() ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'childmonkdate')->textInput() ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'childmonk_temple')->textInput(['maxlength' => true]) ?>
            </div>
<!--            <div class="col-md-4">-->
<!--                --><?php ////$form->field($model, 'childmonk_address')->textInput() ?>
<!--            </div>-->

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

            <div class="clearfix"></div>

            <div class="col-md-4">
                <?= $form->field($model, 'childmonk_t1_name')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'childmonk_t1_temple')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?php $form->field($model, 'childmonk_t1_address')->textInput() ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'province_ii')->dropdownList(
                    ArrayHelper::map(Province::find()->all(),
                        'PROVINCE_ID',
                        'PROVINCE_NAME'),
                    [
                        'id' => 'ddl-province-ii',
                        'prompt' => 'เลือกจังหวัด'
                    ]); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'amphur_ii')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'ddl-amphur-ii'],
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province-ii'],
                        'placeholder' => 'เลือกอำเภอ...',
                        'url' => Url::to(['/person-master/getamphur'])
                    ]
                ]); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'tambol_ii')->widget(DepDrop::classname(), [
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province-ii', 'ddl-amphur-ii'],
                        'placeholder' => 'เลือกตำบล...',
                        'url' => Url::to(['/person-master/getdistrict'])
                    ]
                ]); ?>
            </div>

            <hr style="width: 100%; color: black; height: 1px; background-color:black;" />

            <div class="col-md-4">
                <?= $form->field($model, 'monk_date')->textInput() ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'monk_temple')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'province_iii')->dropdownList(
                    ArrayHelper::map(Province::find()->all(),
                        'PROVINCE_ID',
                        'PROVINCE_NAME'),
                    [
                        'id' => 'ddl-province-iii',
                        'prompt' => 'เลือกจังหวัด'
                    ]); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'amphur_iii')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'ddl-amphur-iii'],
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province-iii'],
                        'placeholder' => 'เลือกอำเภอ...',
                        'url' => Url::to(['/person-master/getamphur'])
                    ]
                ]); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'tambol_iii')->widget(DepDrop::classname(), [
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province-iii', 'ddl-amphur-iii'],
                        'placeholder' => 'เลือกตำบล...',
                        'url' => Url::to(['/person-master/getdistrict'])
                    ]
                ]); ?>
            </div>

<!--            --><?php //$form->field($model, 'monk_address')->textInput() ?>


            <div class="col-md-4">
                <?= $form->field($model, 'monk_t1_name')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'monk_t1_temple')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'province_iv')->dropdownList(
                    ArrayHelper::map(Province::find()->all(),
                        'PROVINCE_ID',
                        'PROVINCE_NAME'),
                    [
                        'id' => 'ddl-province-iv',
                        'prompt' => 'เลือกจังหวัด'
                    ]); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'amphur_iv')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'ddl-amphur-iv'],
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province-iv'],
                        'placeholder' => 'เลือกอำเภอ...',
                        'url' => Url::to(['/person-master/getamphur'])
                    ]
                ]); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'tambol_iv')->widget(DepDrop::classname(), [
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province-iv', 'ddl-amphur-iv'],
                        'placeholder' => 'เลือกตำบล...',
                        'url' => Url::to(['/person-master/getdistrict'])
                    ]
                ]); ?>
            </div>

            <!--                --><?php //$form->field($model, 'monk_t1_address')->textInput(['maxlength' => true]) ?>
            <hr style="width: 100%; color: black; height: 1px; background-color:black;" />

            <div class="col-md-4">
                <?= $form->field($model, 'monk_t2_name')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'monk_t2_temple')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'province_v')->dropdownList(
                    ArrayHelper::map(Province::find()->all(),
                        'PROVINCE_ID',
                        'PROVINCE_NAME'),
                    [
                        'id' => 'ddl-province-v',
                        'prompt' => 'เลือกจังหวัด'
                    ]); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'amphur_v')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'ddl-amphur-v'],
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province-v'],
                        'placeholder' => 'เลือกอำเภอ...',
                        'url' => Url::to(['/person-master/getamphur'])
                    ]
                ]); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'tambol_v')->widget(DepDrop::classname(), [
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province-v', 'ddl-amphur-v'],
                        'placeholder' => 'เลือกตำบล...',
                        'url' => Url::to(['/person-master/getdistrict'])
                    ]
                ]); ?>
            </div>

            <!--    --><?php //$form->field($model, 'monk_t2_address')->textInput() ?>
            <hr style="width: 100%; color: black; height: 1px; background-color:black;" />

            <div class="col-md-4">
                <?= $form->field($model, 'monk_t3_name')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'monk_t3_temple')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'province_vi')->dropdownList(
                    ArrayHelper::map(Province::find()->all(),
                        'PROVINCE_ID',
                        'PROVINCE_NAME'),
                    [
                        'id' => 'ddl-province-vi',
                        'prompt' => 'เลือกจังหวัด'
                    ]); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'amphur_vi')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'ddl-amphur-vi'],
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province-vi'],
                        'placeholder' => 'เลือกอำเภอ...',
                        'url' => Url::to(['/person-master/getamphur'])
                    ]
                ]); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'tambol_vi')->widget(DepDrop::classname(), [
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province-vi', 'ddl-amphur-vi'],
                        'placeholder' => 'เลือกตำบล...',
                        'url' => Url::to(['/person-master/getdistrict'])
                    ]
                ]); ?>
            </div>

            <hr class="hr-primary" />
            <!--    --><?php //$form->field($model, 'monk_t3_address')->textInput() ?>
            <hr style="width: 100%; color: black; height: 1px; background-color:black;" />

            <div class="col-md-4">
                <?= $form->field($model, 'staytemple')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'staymonkname')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'province_vii')->dropdownList(
                    ArrayHelper::map(Province::find()->all(),
                        'PROVINCE_ID',
                        'PROVINCE_NAME'),
                    [
                        'id' => 'ddl-province-vii',
                        'prompt' => 'เลือกจังหวัด'
                    ]); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'amphur_vii')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'ddl-amphur-vii'],
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province-vii'],
                        'placeholder' => 'เลือกอำเภอ...',
                        'url' => Url::to(['/person-master/getamphur'])
                    ]
                ]); ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'tambol_vii')->widget(DepDrop::classname(), [
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province-vii', 'ddl-amphur-vii'],
                        'placeholder' => 'เลือกตำบล...',
                        'url' => Url::to(['/person-master/getdistrict'])
                    ]
                ]); ?>
            </div>

            <!--    --><?php //$form->field($model, 'staymonk_address')->textInput() ?>

        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
