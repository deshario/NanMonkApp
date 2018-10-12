<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StaytempleTrans */

$this->title = 'Update Staytemple Trans: ' . $model->idstay;
$this->params['breadcrumbs'][] = ['label' => 'Staytemple Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idstay, 'url' => ['view', 'id' => $model->idstay]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="staytemple-trans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
