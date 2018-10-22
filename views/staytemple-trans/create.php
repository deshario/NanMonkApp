<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StaytempleTrans */

$this->title = 'เพิ่มใหม่';
$this->params['breadcrumbs'][] = ['label' => 'การจำพรรษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staytemple-trans-create">

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
