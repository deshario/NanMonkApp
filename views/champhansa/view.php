<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Champhansa */

$this->title = $model->champhansa_id;
$this->params['breadcrumbs'][] = ['label' => 'Champhansas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="champhansa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->champhansa_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->champhansa_id], [
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
            'champhansa_id',
            'champhansa_temple',
            'champhansa_address',
            'champhansa_move_in',
            'champhansa_move_out',
            'champhansa_duration',
        ],
    ]) ?>

</div>
