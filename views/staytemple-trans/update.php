<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StaytempleTrans */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'การจำพรรษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="staytemple-trans-update">

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
