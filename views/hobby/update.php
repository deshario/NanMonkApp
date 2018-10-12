<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hobby */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'ความสามารถพิเศษ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hobbytype];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="hobby-update">

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
