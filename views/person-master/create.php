<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PersonMaster */

$this->title = 'เพิ่มข้อมูล';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลพืนฐาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-master-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
