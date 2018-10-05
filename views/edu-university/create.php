<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EduUniversity */

$this->title = 'Create Edu University';
$this->params['breadcrumbs'][] = ['label' => 'Edu Universities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-university-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
