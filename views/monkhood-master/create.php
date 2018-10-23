<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MonkhoodMaster */

$this->title = 'เพิ่มข้อมูล';
$this->params['breadcrumbs'][] = ['label' => 'การบรรพชาอุปสมบท'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monkhood-master-create">

    <?= $this->render('_form', [
        'model' => $model,
        'child_amphur' => [],
        'child_district' => [],
        'child_t1_amphur' => [],
        'child_t1_district' => [],
        'monk_t1_amphur' => [],
        'monk_t1_district' => [],
        'monk_t2_amphur' => [],
        'monk_t2_district' => [],
    ]) ?>

</div>
