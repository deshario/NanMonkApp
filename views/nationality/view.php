<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nationality */

$this->title = $model->idnationality;
$this->params['breadcrumbs'][] = ['label' => 'Nationalities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nationality-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idnationality], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idnationality], [
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
            'idnationality',
            'nationalityname',
        ],
    ]) ?>

</div>
