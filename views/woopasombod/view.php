<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Woopasombod */

$this->title = $model->woopasombod_id;
$this->params['breadcrumbs'][] = ['label' => 'Woopasombods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="woopasombod-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->woopasombod_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->woopasombod_id], [
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
            'woopasombod_id',
            'woopasombod_date',
            'woopasombod_temple',
            'woopasombod_address',
            'woopatcha_by',
            'woopatcha_address',
            'kammawajarn',
            'kammawajarn_address',
            'anutsawanajarn',
            'anutsawanajarn_address',
        ],
    ]) ?>

</div>
