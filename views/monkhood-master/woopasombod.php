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
        $childmonk_t2_age = $model->monk_age;
        $childmonk_t2_date = $model->monk_date;
        $childmonk_t2_temple = $model->monk_temple;

        $childmonk_t2_province_id = $model->monkAddress->province_id;
        $childmonk_t2_amphur_id = $model->monkAddress->amphur_id;
        $childmonk_t2_tambol_id = $model->monkAddress->tambol_id;

        $province_t2 = \app\models\Province::find()->where('PROVINCE_ID = ' . $childmonk_t2_province_id)->one()->PROVINCE_NAME;
        $amphur_t2 = \app\models\Amphur::find()->where('AMPHUR_ID = ' . $childmonk_t2_amphur_id)->one()->AMPHUR_NAME;
        $tambon_t2 = \app\models\District::find()->where('DISTRICT_ID = ' . $childmonk_t2_tambol_id)->one()->DISTRICT_NAME;
        $province_t2 = str_replace(' ', '', $province_t2);
        $amphur_t2 = str_replace(' ', '', $amphur_t2);
        $tambon_t2 = str_replace(' ', '', $tambon_t2);
        $childmonk_t2_address =  ' ตำบล ' . $tambon_t2 . ' อำเภอ ' . $amphur_t2 . ' จังหวัด ' . $province_t2;

        $monk_t1_name = $model->monk_t1_name;
        $monk_t1_temple = $model->monk_t1_temple;
        $monk_t1_province_id = $model->monkT1Address->province_id;
        $monk_t1_amphur_id = $model->monkT1Address->amphur_id;
        $monk_t1_tambol_id = $model->monkT1Address->tambol_id;
        $monk_t1_province = \app\models\Province::find()->where('PROVINCE_ID = ' . $monk_t1_province_id)->one()->PROVINCE_NAME;
        $monk_t1_amphur = \app\models\Amphur::find()->where('AMPHUR_ID = ' . $monk_t1_amphur_id)->one()->AMPHUR_NAME;
        $monk_t1_tambol = \app\models\District::find()->where('DISTRICT_ID = ' . $monk_t1_tambol_id)->one()->DISTRICT_NAME;
        $monk_t1_province = str_replace(' ', '', $monk_t1_province);
        $monk_t1_amphur = str_replace(' ', '', $monk_t1_amphur);
        $monk_t1_tambol = str_replace(' ', '', $monk_t1_tambol);
        $monk_t1_address =  ' ตำบล ' . $monk_t1_tambol . ' อำเภอ ' . $monk_t1_amphur . ' จังหวัด ' . $monk_t1_province;

        $monk_t2_name = $model->monk_t2_name;
        $monk_t2_temple = $model->monk_t2_temple;
        $monk_t2_province_id = $model->monkT2Address->province_id;
        $monk_t2_amphur_id = $model->monkT2Address->amphur_id;
        $monk_t2_tambol_id = $model->monkT2Address->tambol_id;
        $monk_t2_province = \app\models\Province::find()->where('PROVINCE_ID = ' . $monk_t2_province_id)->one()->PROVINCE_NAME;
        $monk_t2_amphur = \app\models\Amphur::find()->where('AMPHUR_ID = ' . $monk_t2_amphur_id)->one()->AMPHUR_NAME;
        $monk_t2_tambol = \app\models\District::find()->where('DISTRICT_ID = ' . $monk_t2_tambol_id)->one()->DISTRICT_NAME;
        $monk_t2_province = str_replace(' ', '', $monk_t2_province);
        $monk_t2_amphur = str_replace(' ', '', $monk_t2_amphur);
        $monk_t2_tambol = str_replace(' ', '', $monk_t2_tambol);
        $monk_t2_address =  ' ตำบล ' . $monk_t2_tambol . ' อำเภอ ' . $monk_t2_amphur . ' จังหวัด ' . $monk_t2_province;

        $monk_t3_name = $model->monk_t3_name;
        $monk_t3_temple = $model->monk_t3_temple;
        $monk_t3_province_id = $model->monkT3Address->province_id;
        $monk_t3_amphur_id = $model->monkT3Address->amphur_id;
        $monk_t3_tambol_id = $model->monkT3Address->tambol_id;
        $monk_t3_province = \app\models\Province::find()->where('PROVINCE_ID = ' . $monk_t3_province_id)->one()->PROVINCE_NAME;
        $monk_t3_amphur = \app\models\Amphur::find()->where('AMPHUR_ID = ' . $monk_t3_amphur_id)->one()->AMPHUR_NAME;
        $monk_t3_tambol = \app\models\District::find()->where('DISTRICT_ID = ' . $monk_t3_tambol_id)->one()->DISTRICT_NAME;
        $monk_t3_province = str_replace(' ', '', $monk_t3_province);
        $monk_t3_amphur = str_replace(' ', '', $monk_t3_amphur);
        $monk_t3_tambol = str_replace(' ', '', $monk_t3_tambol);
        $monk_t3_address =  ' ตำบล ' . $monk_t3_tambol . ' อำเภอ ' . $monk_t3_amphur . ' จังหวัด ' . $monk_t3_province;

        $staytemple = $model->staytemple;
        $staymonkname = $model->staymonkname;
        $monk_stay_province_id = $model->staymonkAddress->province_id;
        $monk_stay_amphur_id = $model->staymonkAddress->amphur_id;
        $monk_stay_tambol_id = $model->staymonkAddress->tambol_id;
        $monk_stay_province = \app\models\Province::find()->where('PROVINCE_ID = ' . $monk_stay_province_id)->one()->PROVINCE_NAME;
        $monk_stay_amphur = \app\models\Amphur::find()->where('AMPHUR_ID = ' . $monk_stay_amphur_id)->one()->AMPHUR_NAME;
        $monk_stay_tambol = \app\models\District::find()->where('DISTRICT_ID = ' . $monk_stay_tambol_id)->one()->DISTRICT_NAME;
        $monk_stay_province = str_replace(' ', '', $monk_stay_province);
        $monk_stay_amphur = str_replace(' ', '', $monk_stay_amphur);
        $monk_stay_tambol = str_replace(' ', '', $monk_stay_tambol);
        $monk_stay_address =  ' ตำบล ' . $monk_stay_tambol . ' อำเภอ ' . $monk_stay_amphur . ' จังหวัด ' . $monk_stay_province;
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
                    
                    <form class='' style='margin-top: 15px'>
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>หมายเลขบัตรประชาชน</label>
                                        <input type='text' class='form-control' value='$idperson'>
                                    </div>
                                </div>
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>อุปสมบทเมืออายุ</label>
                                        <input type='text' class='form-control' value='$childmonk_t2_age'>
                                    </div>
                                </div>
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>วันที่อุปสมบท</label>
                                        <input type='text' class='form-control' value='$childmonk_t2_date'>
                                    </div>
                                </div>
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>วัดที่อุปสมบท</label>
                                        <input type='text' class='form-control' value='$childmonk_t2_temple'>
                                    </div>
                                </div>
                                
                                 <div class='col-md-8'>
                                    <div class='form-group'>
                                        <label>ที่อยู่ของวัดที่อุปสมบท</label>
                                        <input type='text' class='form-control' value='$childmonk_t2_address'>
                                    </div>
                                </div>
                                
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <label>ชื่อพระอุปัชฌาย์</label>
                                        <input type='text' class='form-control' value='$monk_t1_name'>
                                    </div>
                                </div>
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>วัดของพระอุปัชฌาย์</label>
                                        <input type='text' class='form-control' value='$monk_t1_temple'>
                                    </div>
                                </div>
                                
                                <div class='col-md-5'>
                                    <div class='form-group'>
                                        <label>ที่อยู่วัดของพระอุปัชฌาย์</label>
                                        <input type='text' class='form-control' value='$monk_t1_address'>
                                    </div>
                                </div>
                                
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <label>ชื่อพระกรรมวาจาจารย์</label>
                                        <input type='text' class='form-control' value='$monk_t2_name'>
                                    </div>
                                </div>   
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>วัดของพระกรรมวาจาจารย์</label>
                                        <input type='text' class='form-control' value='$monk_t2_temple'>
                                    </div>
                                </div>   
                                
                                <div class='col-md-5'>
                                    <div class='form-group'>
                                        <label>ที่อยู่วัดของพระกรรมวาจาจารย์</label>
                                        <input type='text' class='form-control' value='$monk_t2_address'>
                                    </div>
                                </div>   
                                
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <label>ชื่อของพระอนุสาวนาจารย์</label>
                                        <input type='text' class='form-control' value='$monk_t3_name'>
                                    </div>
                                </div>   
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>วัดของพระอนุสาวนาจารย์</label>
                                        <input type='text' class='form-control' value='$monk_t3_temple'>
                                    </div>
                                </div>   
                                
                                <div class='col-md-5'>
                                    <div class='form-group'>
                                        <label>ที่อยู่วัดของพระอนุสาวนาจารย์</label>
                                        <input type='text' class='form-control' value='$monk_t3_address'>
                                    </div>
                                </div>  
                                
                                 <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>สังกัดวัดเมื่อบวช</label>
                                        <input type='text' class='form-control' value='$staytemple'>
                                    </div>
                                </div>  
                                
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <label>ชื่อเจ้าอาวาสวัดที่สังกัดเมื่อบวช</label>
                                        <input type='text' class='form-control' value='$staymonkname'>
                                    </div>
                                </div>  
                                
                                <div class='col-md-5'>
                                    <div class='form-group'>
                                        <label>ที่อยู่วัดที่สังกัดเมื่อบวช</label>
                                        <input type='text' class='form-control' value='$monk_stay_address'>
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