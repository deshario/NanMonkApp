<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingTrans */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'การอบรม', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->training->trainingname];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="training-trans-update">

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
