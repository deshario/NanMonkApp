<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZipcodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รหัสไปรษณีย์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zipcode-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'showOnEmpty' => false,
        'summary' => '',
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn', 'header' => '',],

            'ZIPCODE_ID',
            'DISTRICT_CODE',
            'PROVINCE_ID',
            'AMPHUR_ID',
            'DISTRICT_ID',
            //'ZIPCODE',

            ['class' => 'yii\grid\ActionColumn'],
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
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; รหัสไปรษณีย์ทั้งหมด',
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
