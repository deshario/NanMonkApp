<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Address */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'ที่อยู่', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->address_id];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="address-update">

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
