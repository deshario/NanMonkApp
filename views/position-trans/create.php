<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PositionTrans */

$this->title = 'เพิ่มตำแหน่งที่ได้รับ';
$this->params['breadcrumbs'][] = ['label' => 'ตำแหน่งทางคณะสงฆ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-trans-create">

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
