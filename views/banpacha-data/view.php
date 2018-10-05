<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BanpachaData */

$this->title = $model->banpacha_id;
$this->params['breadcrumbs'][] = ['label' => 'Banpacha Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banpacha-data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->banpacha_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->banpacha_id], [
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
            'banpacha_id',
            'banpacha_temple',
            'banpacha_date',
            'banpacha_address',
            'woopatcha_by',
            'woopatcha_temple',
            'woopatcha_address',
        ],
    ]) ?>

</div>
