<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EducationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Educations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Education', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'education_id',
            'user_id',
            'edu_school',
            'edu_university',
            'edu_dhamma',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
