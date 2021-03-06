<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrainingTrans */

$this->title = 'เพิ่มประวัติการอบรม';
$this->params['breadcrumbs'][] = ['label' => 'การอบรม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-trans-create">

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
