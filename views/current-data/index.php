<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CurrentDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลปัจจุบัน';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$dataExists = -1;
foreach ($dataProvider->models as $model) {
    if ($model->current_id == "" || $model->current_id == null) {
        $dataExists = -1;
    } else {
        $dataExists = 1;
        $current = new \app\models\CurrentData();
        $current_id = $model->current->current_id;
        $citizen_no = $model->current->citizen_no;
        $book_no = $model->current->book_no;
        $current_name = $model->current->current_name;
        $surname = $model->current->surname;
        $cogname = $model->current->cogname;
        $age = $model->current->birthday;
        $year = $model->current->phansa_year;
        $wittaya = $model->current->wittayathana;
        $temple = $model->current->temple;
        $sect = $model->current->sect;

        $career = $model->current->career;
        $national = $model->current->national;
        $father_name = $model->current->father_name;
        $mother_name = $model->current->mother_name;

        $home_no = $model->current->currentAddress->home_no;
        $tambon_id = $model->current->currentAddress->tambol;
        $amphur_id = $model->current->currentAddress->amphur;
        $province_id = $model->current->currentAddress->province;
        $zipcode = $model->current->currentAddress->zipcode;

        $amphur = \app\models\Amphur::find()->where('AMPHUR_ID = '.$amphur_id)->one()->AMPHUR_NAME;
        $province = \app\models\Province::find()->where('PROVINCE_ID = '.$province_id)->one()->PROVINCE_NAME;
        $tambon = \app\models\Tambol::find()->where('DISTRICT_ID = '.$tambon_id)->one()->DISTRICT_NAME;

        $amphur = str_replace(' ', '', $amphur);
        $province = str_replace(' ', '', $province);
        $tambon = str_replace(' ', '', $tambon);

    }
    ?>
    <?php
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $this->title; ?></h3>
    </div>
    <div class="panel-body">
        <?php if ($dataExists == 1) { ?>
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">หมายเลขบัตนประชาชน</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= $citizen_no; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">หมายเลขหนังสือสุทธิ</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= $book_no; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ชื่อ - สกูล</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= $current_name . " " . $surname; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">อายุ</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= $current->getMyAge($age); ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ฉายา</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= $cogname; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">พรรษา</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= $year . ' ปีที่ ' . $temple; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">วิทยฐานะ</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= $wittaya; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ที่อยู่</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= 'บ้านเลขที่ '.$home_no.' ตำบล '.$tambon.' อำเภอ '.$amphur.' จังหวัด '.$province.' '.$zipcode; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">สังกัดนิกาย</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= $sect; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">อาชีพ</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= $career; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">สัญชาติ</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= $national; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ชื่อพ่อ</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= $father_name; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ชื่อแม่</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?= $mother_name; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?= Html::a('แก้ไขข้อมูล', ['update', 'id' => $current_id], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </form>
        <?php } else {
            echo "คูณยังไม่ได้กรอกข้อมูล กรุณา " . Html::a('คลิกที่นี่', ['create']) . ' เพื่อที่จะเพิ่มข้อมูล';
        }
        ?>
    </div>
</div>
