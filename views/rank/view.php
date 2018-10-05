<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rank */

$this->title = $model->rank_id;
$this->params['breadcrumbs'][] = ['label' => 'Ranks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rank-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->rank_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->rank_id], [
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
            'rank_id',
            'rank_position',
            'rank_given_temple',
            'rank_given_date',
            'rank_temple_address',
            'rank_type',
            'rank_file',
        ],
    ]) ?>

</div>
