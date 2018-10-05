<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TambolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ตำบล';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tambol-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'showOnEmpty' => false,
        'summary' => '',
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn', 'header' => '',],

            'DISTRICT_ID',
            'DISTRICT_CODE',
            'DISTRICT_NAME',
            'AMPHUR_ID',
            'PROVINCE_ID',
            //'GEO_ID',

            //['class' => 'yii\grid\ActionColumn'],
        ],
        'resizableColumns' => false,
        'responsiveWrap' => false,
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
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; ตำบลทั้งหมด',
                'content' => $content,
                'active' => true,
            ],
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

