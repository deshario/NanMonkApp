<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Province;
use karatae99\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\MovetempleTrans */
/* @var $form yii\widgets\ActiveForm */

$model->province = $model->province;
?>

<div class="movetemple-trans-form">

    <?php $form = ActiveForm::begin(); ?>

   <div class="row">
       <div class="col-md-6">
           <?= $form->field($model, 'idperson')->textInput(['maxlength' => true, 'readonly' => true]) ?>
       </div>

       <div class="col-md-6">
           <?= $form->field($model, 'fromdate')->widget(
               DatePicker::className(), [
               'language' => 'th', // Thai B.E.
               'clientOptions' => [
                   'autoclose' => true,
                   'format' => 'yyyy-mm-dd'
               ]
           ]);?>
       </div>

       <div class="col-md-6"><?= $form->field($model, 'fromtemple')->textInput(['maxlength' => true]) ?></div>

       <div class="col-md-6"><?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?></div>

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

       <div class="col-md-12">
           <div class="form-group">
               <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
           </div>
       </div>
   </div>

    <?php ActiveForm::end(); ?>

</div>
