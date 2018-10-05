<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tambol */

$this->title = 'Update Tambol: ' . $model->DISTRICT_ID;
$this->params['breadcrumbs'][] = ['label' => 'Tambols', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DISTRICT_ID, 'url' => ['view', 'id' => $model->DISTRICT_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tambol-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
