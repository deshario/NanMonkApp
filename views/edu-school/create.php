<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EduSchool */

$this->title = 'Create Edu School';
$this->params['breadcrumbs'][] = ['label' => 'Edu Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-school-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
