<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HobbyTrans */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'ความสามมารถพิเศษ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hobby->hobbytype];
$this->params['breadcrumbs'][] = ['label' => $model->others];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="hobby-trans-update">

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
