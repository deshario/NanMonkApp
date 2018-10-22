<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonMaster */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลพืนฐาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idperson];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="person-master-update">

    <?= $this->render('_form', [
        'model' => $model,
        'amphur'=> $amphur,
        'district' =>$district,
        'phumlamnao_amphur'=> $phumlamnao_amphur,
        'phumlamnao_district' => $phumlamnao_district,
    ]) ?>

</div>
