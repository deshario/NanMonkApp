<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SpecialworkTrans */

$this->title = 'Create Specialwork Trans';
$this->params['breadcrumbs'][] = ['label' => 'Specialwork Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialwork-trans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
