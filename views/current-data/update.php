<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CurrentData */

$this->title = 'แก้ไขข้อมูล';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลปัจจุบัน', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->current_id, 'url' => ['view', 'id' => $model->current_id]];
$this->params['breadcrumbs'][] = 'แก้ไขข้อมูล';
?>
<div class="current-data-update">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $this->title; ?></h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
