<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BanpachaData */

$this->title = 'Update Banpacha Data: ' . $model->banpacha_id;
$this->params['breadcrumbs'][] = ['label' => 'Banpacha Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->banpacha_id, 'url' => ['view', 'id' => $model->banpacha_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banpacha-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
