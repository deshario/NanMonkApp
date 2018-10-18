<?php

use kartik\color\ColorInput;
use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\MonkhoodMaster;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลพืนฐาน';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$dataExists = -1;
foreach ($dataProvider->models as $model) {
    if ($model->user_id == "" || $model->user_id == null) {
        $dataExists = -1;
    } else {
        $dataExists = 1;
        $idperson = $model->idperson;
        $user_id = $model->user_id;
        $person_book_no = $model->person_book_no;
        $person_pic = $model->person_pic;
        $imgpath = Yii::getAlias('@web') . '/uploads/avatars/' . $model->person_pic;
        $firstname = $model->firstname;
        $lastname = $model->surname;
        $aliasname = $model->aliasname;
        $birthdate = $model->birthdate;
        $age = date_diff(date_create($birthdate), date_create('now'))->y;
        $staytemp = $model->staytemp;
        $level = $model->level;
        $temple = $model->temple;
        $section = $model->section;

        $homeno = $model->homeno;
        $tambon_id = $model->address0->tambol_id;
        $amphur_id = $model->address0->amphur_id;
        $province_id = $model->address0->province_id;

        $amphur = \app\models\Amphur::find()->where('AMPHUR_ID = ' . $amphur_id)->one()->AMPHUR_NAME;
        $province = \app\models\Province::find()->where('PROVINCE_ID = ' . $province_id)->one()->PROVINCE_NAME;
        $tambon = \app\models\District::find()->where('DISTRICT_ID = ' . $tambon_id)->one()->DISTRICT_NAME;

        $amphur = str_replace(' ', '', $amphur);
        $province = str_replace(' ', '', $province);
        $tambon = str_replace(' ', '', $tambon);
        $address1 = $homeno . ' ตำบล ' . $tambon . ' อำเภอ ' . $amphur . ' จังหวัด ' . $province;

        ////////////////////////////////////////////////////////////////////////////

        $occupation = $model->occupation;
        $nationality = $model->nationality->nationalityname;
        $quality = $model->quality;
        $special = $model->special;
        $color = $model->color;
        $color = ColorInput::widget([
            'name' => 'color',
            'value' => $color,
            'readonly' => true
        ]);
        $father = $model->father;
        $mother = $model->mother;

        $homeno_phum = $model->family_homeno;
        $phum_tambon_id = $model->familyAddress->tambol_id;
        $phum_amphur_id = $model->familyAddress->amphur_id;
        $phum_province_id = $model->familyAddress->province_id;

        $amphur_phum = \app\models\Amphur::find()->where('AMPHUR_ID = ' . $phum_amphur_id)->one()->AMPHUR_NAME;
        $province_phum = \app\models\Province::find()->where('PROVINCE_ID = ' . $phum_province_id)->one()->PROVINCE_NAME;
        $tambon_phum = \app\models\District::find()->where('DISTRICT_ID = ' . $phum_tambon_id)->one()->DISTRICT_NAME;

        $amphur_phum = str_replace(' ', '', $amphur_phum);
        $province_phum = str_replace(' ', '', $province_phum);
        $tambon_phum = str_replace(' ', '', $tambon_phum);
        $family_address = $homeno_phum . ' ตำบล ' . $tambon_phum . ' อำเภอ ' . $amphur_phum . ' จังหวัด ' . $province_phum;
    }
}
?>


<div class="person-master-index">

    <?php if ($dataExists == 1){
        $content = "
            <div class='row'>
                <div class='col-md-12'>
                    
                            <form class='' style='margin-top: 15px'>
            
                             <!--   <div class='col-md-12'>
                                    <label class='col-sm-2 control-label'>รูปภาพ</label>
                                    <div class='col-xs-12 col-md-3'>
                                        <a href='#' class='thumbnail'>
                                            <img src='$imgpath' class='img-responsive'/>
                                        </a>
                                    </div>
                                </div>-->
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>หมายเลขบัตรประชาชน</label>
                                        <input type='text' class='form-control' value='$idperson'>
                                    </div>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>หมายเลขหนังสือสุทธิ</label>
                                        <input type='text' class='form-control' value='$person_book_no'>
                                    </div>
                                </div>
                                
                                <div class='col-md-4'>
                                     <div class='form-group'>
                                        <label>ชื่อปัจจุบัน</label>
                                        <input type='text' class='form-control' value='ส.ณ $firstname'>
                                    </div>  
                                </div> 
                                
                                 <div class='col-md-4'>
                                     <div class='form-group'>
                                        <label>ฉายา</label>
                                        <input type='text' class='form-control' value='$aliasname'>
                                    </div>  
                                </div>  
                                
                                <div class='col-md-4'>
                                     <div class='form-group'>
                                        <label>นามสกุล</label>
                                        <input type='text' class='form-control' value='$lastname'>
                                    </div>  
                                </div>   
                                
                                 <div class='col-md-4'>
                                     <div class='form-group'>
                                        <label>อายุ</label>
                                        <input type='text' class='form-control' value='$age'>
                                    </div>  
                                </div>     
                                
                                 <div class='col-md-4'>
                                     <div class='form-group'>
                                        <label>พรรษา</label>
                                        <input type='text' class='form-control' value='$staytemp'>
                                    </div>  
                                </div>  
                                
                                <div class='col-md-4'>
                                     <div class='form-group'>
                                        <label>วิทยาฐานะ</label>
                                        <input type='text' class='form-control' value='$level'>
                                    </div>  
                                </div> 
                                
                                 <div class='col-md-4'>
                                     <div class='form-group'>
                                        <label>วัด</label>
                                        <input type='text' class='form-control' value='$temple'>
                                    </div>  
                                </div> 
                                
                                 <div class='col-md-4'>
                                     <div class='form-group'>
                                        <label>ที่อยู่</label>
                                        <input type='text' class='form-control' value='$address1'>
                                    </div>  
                                </div> 
                                
                                <div class='col-md-4'>
                                     <div class='form-group'>
                                        <label>สังกัดนิกาย</label>
                                        <input type='text' class='form-control' value='$section'>
                                    </div>  
                                </div>             
                                    
                            </form>
                        
                        <div class='clearfix'></div>
                    
                    <div class='box box-solid box-default collapsed-box'>
                        <div class='box-header with-border'>
                            <h3 class='box-title'>ข้อมูลพืนฐาน</h3>
                            <div class='box-tools pull-right'>
                                <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button>
                            </div>
                        </div>
                        <div class='box-body'> 
                            <form class='' style='margin-top: 15px'>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>สถานะเดิม</label>
                                        <input type='text' class='form-control' value='$firstname'>
                                    </div>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>นามสกุล</label>
                                        <input type='text' class='form-control' value='$lastname'>
                                    </div>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>เกิดวันที่</label>
                                        <input type='text' class='form-control' value='$birthdate'>
                                    </div>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>อาชีพ</label>
                                        <input type='text' class='form-control' value='$occupation'>
                                    </div>
                                </div>
                                
                                 <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>สัญชาติ</label>
                                        <input type='text' class='form-control' value='$nationality'>
                                    </div>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>เชื้อชาติ</label>
                                        <input type='text' class='form-control' value='$nationality'>
                                    </div>
                                </div>
                                
                                 <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>สัณฐาน</label>
                                        <input type='text' class='form-control' value='$quality'>
                                    </div>
                                </div>
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>สีเนื้อ</label>
                                        $color
                                    </div>
                                </div>
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>ตำหนิ</label>
                                        <input type='text' class='form-control' value='$special'>
                                    </div>
                                </div>
                                
                                 <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>บิดา</label>
                                        <input type='text' class='form-control' value='$father'>
                                    </div>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>มารดา</label>
                                        <input type='text' class='form-control' value='$mother'>
                                    </div>
                                </div>
                                
                                 <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>ภูมิลำเนา (บ้านเกิด)</label>
                                        <input type='text' class='form-control' value='$family_address'>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class='clearfix'></div>
    ";
    }else{
        $content = "<br/>คูณยังไม่ได้กรอกข้อมูล กรุณา " . Html::a('คลิกที่นี่', ['create'])." เพื่อที่จะเพิ่มข้อมูล";
    }
  ?>

    <?php $contents = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idperson',
            'user_id',
            'person_book_no',
            'person_pic',
            'firstname',
            //'surname',
            //'aliasname',
            //'birthdate',
            //'staytemp',
            //'level',
            //'temple',
            //'homeno',
            //'address',
            //'section',
            //'idnationality',
            //'occupation',
            //'quality',
            //'color',
            //'special',
            //'father',
            //'mother',
            //'family_homeno',
            //'family_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-users"></i>&nbsp;<?= $this->title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $items = [
            [
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; ข้อมูลพืนฐาน',
                'content' => $content,
                'active' => true,
            ],

            [
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; ข้อมูลบรรพชา',
                'linkOptions' => ['data-url' => Url::to(['/monkhood-master/index?data_type='.MonkhoodMaster::banpacha])],
            ],
            [
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; ข้อมูลอุปสมบท',
                'linkOptions' => ['data-url' => Url::to(['/monkhood-master/index?data_type='.MonkhoodMaster::woopasombod])],
            ],
        ];

        echo TabsX::widget([
            'items' => $items,
            'position' => TabsX::POS_ABOVE,
            'align' => TabsX::ALIGN_LEFT,
            'bordered' => true,
            'encodeLabels' => false
        ]);

        ?>
    </div>
</div>
