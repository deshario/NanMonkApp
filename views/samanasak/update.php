<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Samanasak */

$this->title = 'Update Samanasak: ' . $model->samanasak_id;
$this->params['breadcrumbs'][] = ['label' => 'Samanasaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->samanasak_id, 'url' => ['view', 'id' => $model->samanasak_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="samanasak-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
