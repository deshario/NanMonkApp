<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MovetempleTrans */

$this->title = 'Update Movetemple Trans: ' . $model->idmove;
$this->params['breadcrumbs'][] = ['label' => 'Movetemple Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmove, 'url' => ['view', 'id' => $model->idmove]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="movetemple-trans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
