<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StaytempleTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staytemple Trans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staytemple-trans-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Staytemple Trans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idstay',
            'idperson',
            'indate',
            'outdate',
            'staytemple',
            //'staytemple_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
