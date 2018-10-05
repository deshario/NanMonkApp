<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Position */

$this->title = $model->position_name;
$this->params['breadcrumbs'][] = ['label' => 'ตำแหน่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'position_id',
            'position_name',
        ],
    ]) ?>

</div>
