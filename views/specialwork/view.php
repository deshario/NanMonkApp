<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Specialwork */

$this->title = $model->idwork;
$this->params['breadcrumbs'][] = ['label' => 'Specialworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialwork-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idwork], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idwork], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idwork',
            'worktype',
        ],
    ]) ?>

</div>
