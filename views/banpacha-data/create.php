<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BanpachaData */

$this->title = 'Create Banpacha Data';
$this->params['breadcrumbs'][] = ['label' => 'Banpacha Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banpacha-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
