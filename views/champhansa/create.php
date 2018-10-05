<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Champhansa */

$this->title = 'Create Champhansa';
$this->params['breadcrumbs'][] = ['label' => 'Champhansas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="champhansa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
