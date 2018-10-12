<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HobbyTrans */

$this->title = 'Create Hobby Trans';
$this->params['breadcrumbs'][] = ['label' => 'Hobby Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hobby-trans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
