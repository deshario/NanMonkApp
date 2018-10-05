<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EducationLevel */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'ระดับการศึกษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->level_name, 'url' => ['view', 'id' => $model->level_id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="education-level-update">

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
