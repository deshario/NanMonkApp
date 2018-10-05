<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EduDhamma */

$this->title = $model->dhamma_id;
$this->params['breadcrumbs'][] = ['label' => 'Edu Dhammas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-dhamma-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dhamma_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dhamma_id], [
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
            'dhamma_id',
            'dhamma_temple',
            'education_level',
            'dhamma_temple_address',
            'dhamma_transcript',
        ],
    ]) ?>

</div>
