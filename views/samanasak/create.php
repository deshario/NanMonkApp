<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Samanasak */

$this->title = 'Create Samanasak';
$this->params['breadcrumbs'][] = ['label' => 'Samanasaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="samanasak-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
