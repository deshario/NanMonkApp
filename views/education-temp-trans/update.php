<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EducationTempTrans */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'ประวัติการศึกษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'ทางธรรม'];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="education-temp-trans-update">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $this->title; ?></h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
                'amphur'=> $amphur,
                'district' =>$district
            ]) ?>
        </div>
    </div>

</div>
