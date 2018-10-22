<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MovetempleTrans */

$this->title = 'เพิ่มใหม่';
$this->params['breadcrumbs'][] = ['label' => 'การย้ายสังกัด', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movetemple-trans-create">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $this->title; ?></h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
                'amphur'=> [],
                'district' =>[],
            ]) ?>
        </div>
    </div>

</div>
