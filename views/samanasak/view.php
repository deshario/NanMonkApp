<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Samanasak */

$this->title = $model->samanasak_id;
$this->params['breadcrumbs'][] = ['label' => 'Samanasaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="samanasak-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->samanasak_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->samanasak_id], [
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
            'samanasak_id',
            'samanasak_level',
            'rachathinanam',
            'samanasak_date',
        ],
    ]) ?>

</div>
