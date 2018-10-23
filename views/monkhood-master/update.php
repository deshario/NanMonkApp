<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MonkhoodMaster */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'การบรรพชาอุปสมบท'];
$this->params['breadcrumbs'][] = ['label' => $model->idperson];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="monkhood-master-update">

    <?= $this->render('_form', [
        'model' => $model,
        'child_amphur' => $child_amphur,
        'child_district' => $child_district,
        'child_t1_amphur' => $child_t1_amphur,
        'child_t1_district' => $child_t1_district,
        'monk_t1_amphur' => $monk_t1_amphur,
        'monk_t1_district' => $monk_t1_district,
        'monk_t2_amphur' => $monk_t2_amphur,
        'monk_t2_district' => $monk_t2_district,
    ]) ?>

</div>
