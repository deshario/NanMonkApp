<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrainingTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Training Trans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-trans-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Training Trans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idperson',
            'training_id',
            'trainingdate',
            'trainingby',
            //'others',
            //'attachfile',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
