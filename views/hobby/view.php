<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hobby */

$this->title = $model->idhobby;
$this->params['breadcrumbs'][] = ['label' => 'Hobbies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hobby-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idhobby], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idhobby], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idhobby',
            'hobbytype',
        ],
    ]) ?>

</div>
