<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HobbyTrans */

$this->title = 'Update Hobby Trans: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hobby Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hobby-trans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
