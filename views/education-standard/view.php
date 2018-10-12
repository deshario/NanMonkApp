<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EducationStandard */

$this->title = $model->id_education;
$this->params['breadcrumbs'][] = ['label' => 'Education Standards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-standard-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_education], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_education], [
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
            'id_education',
            'education_name',
        ],
    ]) ?>

</div>
