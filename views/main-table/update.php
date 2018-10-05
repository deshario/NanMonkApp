<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MainTable */

$this->title = 'Update Main Table: ' . $model->main_id;
$this->params['breadcrumbs'][] = ['label' => 'Main Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->main_id, 'url' => ['view', 'id' => $model->main_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="main-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
