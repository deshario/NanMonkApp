<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChamphansaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Champhansas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="champhansa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Champhansa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'champhansa_id',
            'champhansa_temple',
            'champhansa_address',
            'champhansa_move_in',
            'champhansa_move_out',
            //'champhansa_duration',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
