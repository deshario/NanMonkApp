<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PositionTrans */

$this->title = $model->idpos;
$this->params['breadcrumbs'][] = ['label' => 'Position Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-trans-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idpos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idpos], [
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
            'idpos',
            'idperson',
            'position_id',
            'positiondate',
            'temple',
            'remark',
            'attachfile',
            'address_id',
        ],
    ]) ?>

</div>
