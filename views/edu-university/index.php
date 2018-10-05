<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EduUniversitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edu Universities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-university-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Edu University', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'university_id',
            'university_name',
            'university_level',
            'university_address',
            'university_transcript',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
