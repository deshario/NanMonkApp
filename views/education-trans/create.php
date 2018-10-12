<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EducationTrans */

$this->title = 'Create Education Trans';
$this->params['breadcrumbs'][] = ['label' => 'Education Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-trans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
