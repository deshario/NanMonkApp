<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PositionTrans */

$this->title = 'Update Position Trans: ' . $model->idpos;
$this->params['breadcrumbs'][] = ['label' => 'Position Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpos, 'url' => ['view', 'id' => $model->idpos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="position-trans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
