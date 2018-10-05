<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MainTable */

$this->title = 'Create Main Table';
$this->params['breadcrumbs'][] = ['label' => 'Main Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
