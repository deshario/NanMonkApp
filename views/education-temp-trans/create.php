<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EducationTempTrans */

$this->title = 'Create Education Temp Trans';
$this->params['breadcrumbs'][] = ['label' => 'Education Temp Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-temp-trans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
