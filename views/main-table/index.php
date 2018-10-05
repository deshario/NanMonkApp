<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MainTableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Main Tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-table-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Main Table', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'main_id',
            'user_id',
            'current_id',
            'banpacha_id',
            'woopasombod_id',
            //'champhansa_id',
            //'education_id',
            //'rank_id',
            //'samanasak_id',
            //'training_id',
            //'talent_id',
            //'portfolio_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
