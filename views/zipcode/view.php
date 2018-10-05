<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Zipcode */

$this->title = $model->ZIPCODE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Zipcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zipcode-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ZIPCODE_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ZIPCODE_ID], [
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
            'ZIPCODE_ID',
            'DISTRICT_CODE',
            'PROVINCE_ID',
            'AMPHUR_ID',
            'DISTRICT_ID',
            'ZIPCODE',
        ],
    ]) ?>

</div>
