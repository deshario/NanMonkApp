<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PromotionTrans */

$this->title = 'Create Promotion Trans';
$this->params['breadcrumbs'][] = ['label' => 'Promotion Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-trans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
