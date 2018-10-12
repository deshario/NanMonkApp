<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StaytempleTrans */

$this->title = 'Create Staytemple Trans';
$this->params['breadcrumbs'][] = ['label' => 'Staytemple Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staytemple-trans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
