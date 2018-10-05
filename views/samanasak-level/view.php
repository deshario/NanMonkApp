<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SamanasakLevel */

$this->title = $model->samanasak_level_name;
$this->params['breadcrumbs'][] = ['label' => 'ลำดับสมณศักดิ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="samanasak-level-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'samanasak_level_id',
            'samanasak_level_name',
        ],
    ]) ?>

</div>
