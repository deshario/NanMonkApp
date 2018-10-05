<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EduUniversity */

$this->title = $model->university_id;
$this->params['breadcrumbs'][] = ['label' => 'Edu Universities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-university-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->university_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->university_id], [
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
            'university_id',
            'university_name',
            'university_level',
            'university_address',
            'university_transcript',
        ],
    ]) ?>

</div>
