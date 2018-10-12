<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MonkhoodMaster */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'การบรรพชาอุปสมบท', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->monkhood_id];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="monkhood-master-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
