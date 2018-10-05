<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WoopasombodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Woopasombods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="woopasombod-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Woopasombod', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'woopasombod_id',
            'woopasombod_date',
            'woopasombod_temple',
            'woopasombod_address',
            'woopatcha_by',
            //'woopatcha_address',
            //'kammawajarn',
            //'kammawajarn_address',
            //'anutsawanajarn',
            //'anutsawanajarn_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
