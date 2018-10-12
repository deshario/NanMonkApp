<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PromotionTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promotion Trans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-trans-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Promotion Trans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpos',
            'idperson',
            'idpromotion',
            'promotiondate',
            'place1',
            //'place2',
            //'temple',
            //'temple_address',
            //'year',
            //'remark',
            //'attachfile',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
