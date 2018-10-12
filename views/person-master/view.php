<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PersonMaster */

$this->title = $model->idperson;
$this->params['breadcrumbs'][] = ['label' => 'Person Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-master-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idperson], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idperson], [
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
            'idperson',
            'user_id',
            'person_book_no',
            'person_pic',
            'firstname',
            'surname',
            'aliasname',
            'birthdate',
            'staytemp',
            'level',
            'temple',
            'homeno',
            'address',
            'section',
            'idnationality',
            'occupation',
            'quality',
            'color',
            'special',
            'father',
            'mother',
            'family_homeno',
            'family_address',
        ],
    ]) ?>

</div>
