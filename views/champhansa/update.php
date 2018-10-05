<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Champhansa */

$this->title = 'Update Champhansa: ' . $model->champhansa_id;
$this->params['breadcrumbs'][] = ['label' => 'Champhansas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->champhansa_id, 'url' => ['view', 'id' => $model->champhansa_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="champhansa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
