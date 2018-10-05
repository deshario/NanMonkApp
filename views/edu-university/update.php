<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EduUniversity */

$this->title = 'Update Edu University: ' . $model->university_id;
$this->params['breadcrumbs'][] = ['label' => 'Edu Universities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->university_id, 'url' => ['view', 'id' => $model->university_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edu-university-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
