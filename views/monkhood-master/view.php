<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MonkhoodMaster */

$this->title = $model->monkhood_id;
$this->params['breadcrumbs'][] = ['label' => 'Monkhood Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monkhood-master-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->monkhood_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->monkhood_id], [
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
            'monkhood_id',
            'idperson',
            'childmonkage',
            'childmonkdate',
            'childmonk_temple',
            'childmonk_address',
            'childmonk_t1_name',
            'childmonk_t1_temple',
            'childmonk_t1_address',
            'monk_age',
            'monk_date',
            'monk_time',
            'monk_temple',
            'monk_address',
            'monk_t1_name',
            'monk_t1_temple',
            'monk_t1_address',
            'monk_t2_name',
            'monk_t2_temple',
            'monk_t2_address',
            'monk_t3_name',
            'monk_t3_temple',
            'monk_t3_address',
            'staytemple',
            'staymonkname',
            'staymonk_address',
        ],
    ]) ?>

</div>
