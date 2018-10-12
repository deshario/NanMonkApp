<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MonkhoodMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การบรรพชาอุปสมบท';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monkhood-master-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'monkhood_id',
            'idperson',
            'childmonkage',
            'childmonkdate',
            'childmonk_temple',
            //'childmonk_address',
            //'childmonk_t1_name',
            //'childmonk_t1_temple',
            //'childmonk_t1_address',
            //'monk_age',
            //'monk_date',
            //'monk_time',
            //'monk_temple',
            //'monk_address',
            //'monk_t1_name',
            //'monk_t1_temple',
            //'monk_t1_address',
            //'monk_t2_name',
            //'monk_t2_temple',
            //'monk_t2_address',
            //'monk_t3_name',
            //'monk_t3_temple',
            //'monk_t3_address',
            //'staytemple',
            //'staymonkname',
            //'staymonk_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-users"></i>&nbsp;<?= $this->title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $items = [
            [
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; monkhood',
                'content' => $content,
                'active' => true,
            ],
            ['label' => '<i class="fa fa-envelope-o"></i>&nbsp; create', 'url' => Url::to(['create'])],
        ];

        echo TabsX::widget([
            'items' => $items,
            'position' => TabsX::POS_ABOVE,
            'align' => TabsX::ALIGN_LEFT,
            'bordered' => true,
            'encodeLabels' => false
        ]);

        ?>
    </div>
</div>
