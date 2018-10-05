<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EduDhamma */

$this->title = 'Update Edu Dhamma: ' . $model->dhamma_id;
$this->params['breadcrumbs'][] = ['label' => 'Edu Dhammas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dhamma_id, 'url' => ['view', 'id' => $model->dhamma_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edu-dhamma-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
