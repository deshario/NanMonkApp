<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Woopasombod */

$this->title = 'Create Woopasombod';
$this->params['breadcrumbs'][] = ['label' => 'Woopasombods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="woopasombod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
