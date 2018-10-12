<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrainingTrans */

$this->title = 'Create Training Trans';
$this->params['breadcrumbs'][] = ['label' => 'Training Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-trans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
