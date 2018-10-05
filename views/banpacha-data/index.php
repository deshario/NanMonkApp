<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BanpachaDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banpacha Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banpacha-data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Banpacha Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'banpacha_id',
            'banpacha_temple',
            'banpacha_date',
            'banpacha_address',
            'woopatcha_by',
            //'woopatcha_temple',
            //'woopatcha_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
