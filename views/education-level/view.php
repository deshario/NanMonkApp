<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EducationLevel */

$this->title = $model->level_name;
$this->params['breadcrumbs'][] = ['label' => 'ระดับการศึกษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-level-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'level_id',
            'level_name',
            'level_type',
        ],
    ]) ?>

</div>
