<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EduDhammaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edu Dhammas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-dhamma-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Edu Dhamma', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dhamma_id',
            'dhamma_temple',
            'education_level',
            'dhamma_temple_address',
            'dhamma_transcript',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
