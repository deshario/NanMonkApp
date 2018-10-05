<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EduSchool */

$this->title = 'Update Edu School: ' . $model->school_id;
$this->params['breadcrumbs'][] = ['label' => 'Edu Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->school_id, 'url' => ['view', 'id' => $model->school_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edu-school-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
