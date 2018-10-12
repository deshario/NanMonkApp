<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MovetempleTrans */

$this->title = 'Create Movetemple Trans';
$this->params['breadcrumbs'][] = ['label' => 'Movetemple Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movetemple-trans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
