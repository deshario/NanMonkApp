<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MainTable */

$this->title = $model->main_id;
$this->params['breadcrumbs'][] = ['label' => 'Main Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-table-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->main_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->main_id], [
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
            'main_id',
            'user_id',
            'current_id',
            'banpacha_id',
            'woopasombod_id',
            'champhansa_id',
            'education_id',
            'rank_id',
            'samanasak_id',
            'training_id',
            'talent_id',
            'portfolio_id',
        ],
    ]) ?>

</div>
