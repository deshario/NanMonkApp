<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EducationTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Education Trans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-trans-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Education Trans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idedu',
            'idperson',
            'education_level',
            'place',
            'major',
            //'year',
            //'abbrev',
            //'transcriptname',
            //'attachfile',
            //'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
