<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EducationTempTrans */

$this->title = $model->idedu;
$this->params['breadcrumbs'][] = ['label' => 'Education Temp Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-temp-trans-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idedu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idedu], [
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
            'idedu',
            'idperson',
            'education_level',
            'temple',
            'place',
            'placeprovince',
            'attachfile',
            'address',
        ],
    ]) ?>

</div>
