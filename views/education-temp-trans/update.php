<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EducationTempTrans */

$this->title = 'Update Education Temp Trans: ' . $model->idedu;
$this->params['breadcrumbs'][] = ['label' => 'Education Temp Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idedu, 'url' => ['view', 'id' => $model->idedu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="education-temp-trans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
