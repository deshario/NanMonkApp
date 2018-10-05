<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EduSchoolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edu Schools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-school-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Edu School', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'school_id',
            'school_name',
            'school_level',
            'school_address',
            'school_transcript',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
