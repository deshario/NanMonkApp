<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EducationTrans */

$this->title = 'เพิ่มประวัติ';
$this->params['breadcrumbs'][] = ['label' => 'ประวัติการศึกษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'ทางธรรม'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-trans-create">

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
