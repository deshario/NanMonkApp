<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CurrentData */

$this->title = 'เพิ่มข้อมูล';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลปัจจุบัน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="current-data-create">

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
