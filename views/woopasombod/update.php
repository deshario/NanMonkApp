<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Woopasombod */

$this->title = 'Update Woopasombod: ' . $model->woopasombod_id;
$this->params['breadcrumbs'][] = ['label' => 'Woopasombods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->woopasombod_id, 'url' => ['view', 'id' => $model->woopasombod_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="woopasombod-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
