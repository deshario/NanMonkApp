<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Province;
use karatae99\datepicker\DatePicker;

?>

<div class="monkhood-master-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']]);
    ?>

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">การบรรพชาอุปสมบท</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">

            <div class='box box-solid box-default'>
                <div class='box-header with-border'>
                    <h3 class='box-title'>บรรพชา</h3>
                    <div class='box-tools pull-right'>
                        <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button>
                    </div>
                </div>
                <div class='box-body'>
                    <div class="col-md-4">
                        <?= $form->field($model, 'idperson')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                    </div>
                    <div class="">
                        <?php //$form->field($model, 'childmonkage')->textInput() ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'childmonkdate')->widget(
                            DatePicker::className(), [
                            'language' => 'th', // Thai B.E.
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]); ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'childmonk_temple')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="clearfix"></div>
                    <!--            <div class="col-md-4">-->
                    <!--                --><?php ////$form->field($model, 'childmonk_address')->textInput() ?>
                    <!--            </div>-->

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
                            'data' => $child_amphur,
                            'pluginOptions' => [
                                'depends' => ['ddl-province'],
                                'placeholder' => 'เลือกอำเภอ...',
                                'url' => Url::to(['/person-master/getamphur'])
                            ]
                        ]); ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'tambol')->widget(DepDrop::classname(), [
                            'data' => $child_district,
                            'pluginOptions' => [
                                'depends' => ['ddl-province', 'ddl-amphur'],
                                'placeholder' => 'เลือกตำบล...',
                                'url' => Url::to(['/person-master/getdistrict'])
                            ]
                        ]); ?>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-4">
                        <?php $form->field($model, 'childmonk_t1_name')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-4">
                        <?php $form->field($model, 'childmonk_t1_temple')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-4">
                        <?php $form->field($model, 'childmonk_t1_address')->textInput() ?>
                    </div>

                    <div class="col-md-4">
                        <?php $form->field($model, 'province_ii')->dropdownList(
                            ArrayHelper::map(Province::find()
                                ->orderBy('PROVINCE_NAME')
                                ->all(),
                                'PROVINCE_ID',
                                'PROVINCE_NAME'),
                            [
                                'id' => 'ddl-province-ii',
                                'prompt' => 'เลือกจังหวัด'
                            ]); ?>
                    </div>

                    <div class="col-md-4">
                        <?php $form->field($model, 'amphur_ii')->widget(DepDrop::classname(), [
                            'options' => ['id' => 'ddl-amphur-ii'],
                            'data' => $child_t1_amphur,
                            'pluginOptions' => [
                                'depends' => ['ddl-province-ii'],
                                'placeholder' => 'เลือกอำเภอ...',
                                'url' => Url::to(['/person-master/getamphur'])
                            ]
                        ]); ?>
                    </div>

                    <div class="col-md-4">
                        <?php $form->field($model, 'tambol_ii')->widget(DepDrop::classname(), [
                            'data' => $child_t1_district,
                            'pluginOptions' => [
                                'depends' => ['ddl-province-ii', 'ddl-amphur-ii'],
                                'placeholder' => 'เลือกตำบล...',
                                'url' => Url::to(['/person-master/getdistrict'])
                            ]
                        ]); ?>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class='box box-solid box-default collapsed-box'>
                <div class='box-header with-border'>
                    <h3 class='box-title'>อุปสมบท</h3>
                    <div class='box-tools pull-right'>
                        <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button>
                    </div>
                </div>
                <div class='box-body'>
                    <div class="col-md-4">
                        <?= $form->field($model, 'monk_date')->widget(
                            DatePicker::className(), [
                            'language' => 'th', // Thai B.E.
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]); ?>
                    </div>


                    <div class="col-md-4">
                        <?= $form->field($model, 'monk_temple')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'province_iii')->dropdownList(
                            ArrayHelper::map(Province::find()
                                ->orderBy('PROVINCE_NAME')
                                ->all(),
                                'PROVINCE_ID',
                                'PROVINCE_NAME'),
                            [
                                'id' => 'ddl-province-iii',
                                'prompt' => 'เลือกจังหวัด'
                            ]); ?>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'amphur_iii')->widget(DepDrop::classname(), [
                            'options' => ['id' => 'ddl-amphur-iii'],
                            'data' => $monk_t1_amphur,
                            'pluginOptions' => [
                                'depends' => ['ddl-province-iii'],
                                'placeholder' => 'เลือกอำเภอ...',
                                'url' => Url::to(['/person-master/getamphur'])
                            ]
                        ]); ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'tambol_iii')->widget(DepDrop::classname(), [
                            'data' => $monk_t1_district,
                            'pluginOptions' => [
                                'depends' => ['ddl-province-iii', 'ddl-amphur-iii'],
                                'placeholder' => 'เลือกตำบล...',
                                'url' => Url::to(['/person-master/getdistrict'])
                            ]
                        ]); ?>
                    </div>

                    <!--            --><?php //$form->field($model, 'monk_address')->textInput() ?>
                </div>
            </div>

            <div class='box box-solid box-default collapsed-box'>
                <div class='box-header with-border'>
                    <h3 class='box-title'>พระอุปัชฌาย์</h3>
                    <div class='box-tools pull-right'>
                        <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button>
                    </div>
                </div>
                <div class='box-body'>
                    <div class="col-md-4">
                        <?= $form->field($model, 'monk_t1_name')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'monk_t1_temple')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'province_iv')->dropdownList(
                            ArrayHelper::map(Province::find()
                                ->orderBy('PROVINCE_NAME')
                                ->all(),
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
                            'data' => $monk_t2_amphur,
                            'pluginOptions' => [
                                'depends' => ['ddl-province-iv'],
                                'placeholder' => 'เลือกอำเภอ...',
                                'url' => Url::to(['/person-master/getamphur'])
                            ]
                        ]); ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'tambol_iv')->widget(DepDrop::classname(), [
                            'data' => $monk_t2_district,
                            'pluginOptions' => [
                                'depends' => ['ddl-province-iv', 'ddl-amphur-iv'],
                                'placeholder' => 'เลือกตำบล...',
                                'url' => Url::to(['/person-master/getdistrict'])
                            ]
                        ]); ?>
                    </div>

                    <!--                --><?php //$form->field($model, 'monk_t1_address')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class='box box-solid box-default collapsed-box'>
                <div class='box-header with-border'>
                    <h3 class='box-title'>พระกรรมวาจาจารย์</h3>
                    <div class='box-tools pull-right'>
                        <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button>
                    </div>
                </div>
                <div class='box-body'>
                    <div class="col-md-4">
                        <?= $form->field($model, 'monk_t2_name')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'monk_t2_temple')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'province_v')->dropdownList(
                            ArrayHelper::map(Province::find()
                                ->orderBy('PROVINCE_NAME')
                                ->all(),
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
                            'data' => $monk_t3_amphur,
                            'pluginOptions' => [
                                'depends' => ['ddl-province-v'],
                                'placeholder' => 'เลือกอำเภอ...',
                                'url' => Url::to(['/person-master/getamphur'])
                            ]
                        ]); ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'tambol_v')->widget(DepDrop::classname(), [
                            'data' => $monk_t3_district,
                            'pluginOptions' => [
                                'depends' => ['ddl-province-v', 'ddl-amphur-v'],
                                'placeholder' => 'เลือกตำบล...',
                                'url' => Url::to(['/person-master/getdistrict'])
                            ]
                        ]); ?>
                    </div>

                    <!--    --><?php //$form->field($model, 'monk_t2_address')->textInput() ?>
                </div>
            </div>

            <div class='box box-solid box-default collapsed-box'>
                <div class='box-header with-border'>
                    <h3 class='box-title'>พระอนุสาวนาจารย์</h3>
                    <div class='box-tools pull-right'>
                        <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button>
                    </div>
                </div>
                <div class='box-body'>
                    <div class="col-md-4">
                        <?= $form->field($model, 'monk_t3_name')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'monk_t3_temple')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'province_vi')->dropdownList(
                            ArrayHelper::map(Province::find()
                                ->orderBy('PROVINCE_NAME')
                                ->all(),
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
                            'data' => $monk_t4_amphur,
                            'pluginOptions' => [
                                'depends' => ['ddl-province-vi'],
                                'placeholder' => 'เลือกอำเภอ...',
                                'url' => Url::to(['/person-master/getamphur'])
                            ]
                        ]); ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'tambol_vi')->widget(DepDrop::classname(), [
                            'data' => $monk_t4_district,
                            'pluginOptions' => [
                                'depends' => ['ddl-province-vi', 'ddl-amphur-vi'],
                                'placeholder' => 'เลือกตำบล...',
                                'url' => Url::to(['/person-master/getdistrict'])
                            ]
                        ]); ?>
                    </div>

                    <hr class="hr-primary"/>
                    <!--    --><?php //$form->field($model, 'monk_t3_address')->textInput() ?>
                </div>
            </div>

            <div class='box box-solid box-default collapsed-box'>
                <div class='box-header with-border'>
                    <h3 class='box-title'>สังกัดวัด</h3>
                    <div class='box-tools pull-right'>
                        <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button>
                    </div>
                </div>
                <div class='box-body'>
                    <div class="col-md-4">
                        <?= $form->field($model, 'staytemple')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'staymonkname')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'province_vii')->dropdownList(
                            ArrayHelper::map(Province::find()
                                ->orderBy('PROVINCE_NAME')
                                ->all(),
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
                            'data' => $staymonk_amphur,
                            'pluginOptions' => [
                                'depends' => ['ddl-province-vii'],
                                'placeholder' => 'เลือกอำเภอ...',
                                'url' => Url::to(['/person-master/getamphur'])
                            ]
                        ]); ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'tambol_vii')->widget(DepDrop::classname(), [
                            'data' => $staymonk_district,
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

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success btn-block']) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
