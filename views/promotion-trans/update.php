<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PromotionTrans */

$this->title = 'Update Promotion Trans: ' . $model->idpos;
$this->params['breadcrumbs'][] = ['label' => 'Promotion Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpos, 'url' => ['view', 'id' => $model->idpos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promotion-trans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
