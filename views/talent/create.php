<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Talent */

$this->title = 'Create Talent';
$this->params['breadcrumbs'][] = ['label' => 'Talents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
