<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HobbyTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hobby Trans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hobby-trans-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hobby Trans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idperson',
            'idhobby',
            'others',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
