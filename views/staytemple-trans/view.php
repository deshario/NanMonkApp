<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StaytempleTrans */

$this->title = $model->idstay;
$this->params['breadcrumbs'][] = ['label' => 'Staytemple Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staytemple-trans-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idstay], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idstay], [
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
            'idstay',
            'idperson',
            'indate',
            'outdate',
            'staytemple',
            'staytemple_address',
        ],
    ]) ?>

</div>
