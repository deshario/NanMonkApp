<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EduDhamma */

$this->title = 'Create Edu Dhamma';
$this->params['breadcrumbs'][] = ['label' => 'Edu Dhammas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-dhamma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
