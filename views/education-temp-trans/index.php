<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EducationTempTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Education Temp Trans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-temp-trans-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Education Temp Trans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idedu',
            'idperson',
            'education_level',
            'temple',
            'place',
            //'placeprovince',
            //'attachfile',
            //'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
