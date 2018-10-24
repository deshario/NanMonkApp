<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MonkhoodMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การบรรพชาอุปสมบท';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$dataExists = -1;
foreach ($dataProvider->models as $model) {
    if ($model->idperson == "" || $model->idperson == null) {
        $dataExists = -1;
    } else {
        $dataExists = 1;
        $idperson = $model->idperson;
        $childage = $model->childmonkage;
        $childmonkdate = $model->childmonkdate;
        $childmonktemple = $model->childmonk_temple;
        $childmonk_province_id = $model->childmonkAddress->province_id;
        $childmonk_amphur_id = $model->childmonkAddress->amphur_id;
        $childmonk_tambol_id = $model->childmonkAddress->tambol_id;

        $province = \app\models\Province::find()->where('PROVINCE_ID = ' . $childmonk_province_id)->one()->PROVINCE_NAME;
        $amphur = \app\models\Amphur::find()->where('AMPHUR_ID = ' . $childmonk_amphur_id)->one()->AMPHUR_NAME;
        $tambon = \app\models\District::find()->where('DISTRICT_ID = ' . $childmonk_tambol_id)->one()->DISTRICT_NAME;
        $province = str_replace(' ', '', $province);
        $amphur = str_replace(' ', '', $amphur);
        $tambon = str_replace(' ', '', $tambon);
        $childmonkadderss =  ' ตำบล ' . $tambon . ' อำเภอ ' . $amphur . ' จังหวัด ' . $province;

        $childmonk_t1_name = $model->childmonk_t1_name;
        $childmonk_t1_temple = $model->childmonk_t1_temple;
        $childmonk_t1_province_id = $model->childmonkT1Address->province_id;
        $childmonk_t1_amphur_id = $model->childmonkT1Address->amphur_id;
        $childmonk_t1_tambol_id = $model->childmonkT1Address->tambol_id;


        $province_ii = \app\models\Province::find()->where('PROVINCE_ID = ' . $childmonk_t1_province_id)->one()->PROVINCE_NAME;
        $amphur_ii = \app\models\Amphur::find()->where('AMPHUR_ID = ' . $childmonk_t1_amphur_id)->one()->AMPHUR_NAME;
        $tambon_ii = \app\models\District::find()->where('DISTRICT_ID = ' . $childmonk_t1_tambol_id)->one()->DISTRICT_NAME;
        $province_ii = str_replace(' ', '', $province_ii);
        $amphur_ii = str_replace(' ', '', $amphur_ii);
        $tambon_ii = str_replace(' ', '', $tambon_ii);
        $childmonk_t1_address =  ' ตำบล ' . $tambon_ii . ' อำเภอ ' . $amphur_ii . ' จังหวัด ' . $province_ii;

        $childmonk_t2_age = $model->monk_age;
        $childmonk_t2_date = $model->monk_date;
        $childmonk_t2_temple = $model->monk_temple;

    }
}

?>

<div class="monkhood-master-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'monkhood_id',
            'idperson',
            'childmonkage',
            'childmonkdate',
            'childmonk_temple',
            //'childmonk_address',
            //'childmonk_t1_name',
            //'childmonk_t1_temple',
            //'childmonk_t1_address',
            //'monk_age',
            //'monk_date',
            //'monk_time',
            //'monk_temple',
            //'monk_address',
            //'monk_t1_name',
            //'monk_t1_temple',
            //'monk_t1_address',
            //'monk_t2_name',
            //'monk_t2_temple',
            //'monk_t2_address',
            //'monk_t3_name',
            //'monk_t3_temple',
            //'monk_t3_address',
            //'staytemple',
            //'staymonkname',
            //'staymonk_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    <?php if ($dataExists == 1){
        $content = "
            <div class='row'>
                <div class='col-md-12'>
                
                <div class='alert alert-info alert-dismissible'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        แก้ไขข้อมูลบรรพชาอุปสมบท ".Html::a('คลิกที่นี่', ['update', 'id' => $model->monkhood_id])."
                    </div>
                    
                    <form class='' style='margin-top: 15px'>
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>หมายเลขบัตรประชาชน</label>
                                        <input type='text' class='form-control' value='$idperson' readonly>
                                    </div>
                                </div>
                                
                                   <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>อายุวันที่บรรพชา</label>
                                        <input type='text' class='form-control' value='$childage' readonly>
                                    </div>
                                </div> 
                                
                                 <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>วันที่บรรพชา</label>
                                        <input type='text' class='form-control' value='$childmonkdate' readonly>
                                    </div>
                                </div> 
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>บรรพชาที่วัด</label>
                                        <input type='text' class='form-control' value='$childmonktemple' readonly>
                                    </div>
                                </div> 
                                    
                                <div class='col-md-8'>
                                    <div class='form-group'>
                                        <label>ที่อยู่ของวัดที่บรรพชา</label>
                                        <input type='text' class='form-control' value='$childmonkadderss' readonly>
                                    </div>
                                </div>
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>ชื่อพระที่บรรพชาให้</label>
                                        <input type='text' class='form-control' value='$childmonk_t1_name' readonly>
                                    </div>
                                </div>
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>สังกัดวัด</label>
                                        <input type='text' class='form-control' value='$childmonk_t1_temple' readonly>
                                    </div>
                                </div>
                                
                                 <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>ที่อยู่</label>
                                        <input type='text' class='form-control' value='$childmonk_t1_address' readonly>
                                    </div>
                                </div>
                                
                            </form>
                     
                </div>
            </div>
            
            <div class='clearfix'></div>
    ";
    }else{
        $content = "<br/>คูณยังไม่ได้กรอกข้อมูล กรุณา " . Html::a('คลิกที่นี่', ['create'])." เพื่อที่จะเพิ่มข้อมูล";
    }

    echo $content;

    ?>

</div>