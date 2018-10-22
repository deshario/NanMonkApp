<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PromotionTrans */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'ลำดับสมณศักดิ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->promotion->promotionname];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="promotion-trans-update">

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
