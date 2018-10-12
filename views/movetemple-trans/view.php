<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MovetempleTrans */

$this->title = $model->idmove;
$this->params['breadcrumbs'][] = ['label' => 'Movetemple Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movetemple-trans-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idmove], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idmove], [
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
            'idmove',
            'idperson',
            'fromdate',
            'fromtemple',
            'reason',
            'address',
        ],
    ]) ?>

</div>
