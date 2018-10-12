<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MonkhoodMaster */

$this->title = 'เพิ่มข้อมูล';
$this->params['breadcrumbs'][] = ['label' => 'การบรรพชาอุปสมบท', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monkhood-master-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
