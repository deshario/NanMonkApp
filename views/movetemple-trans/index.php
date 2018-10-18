<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MovetempleTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การย้ายสังกัด';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="movetemple-trans-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'showOnEmpty' => false,
        'summary' => '',
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn', 'header' => '',],

            //'idmove',
            //'idperson',
            'fromdate',
            'fromtemple',
            'reason',
            //'address',
            ['attribute' => 'address',
                'value' => function ($model) {
                    $province_id = $model->address0->province_id;
                    $amphur_id = $model->address0->amphur_id;
                    $tambol_id = $model->address0->amphur_id;
                    $province = \app\models\Province::find()->where('PROVINCE_ID = ' . $province_id)->one()->PROVINCE_NAME;
                    $amphur = \app\models\Amphur::find()->where('AMPHUR_ID = ' . $amphur_id)->one()->AMPHUR_NAME;
                    $tambon = \app\models\District::find()->where('DISTRICT_ID = ' . $tambol_id)->one()->DISTRICT_NAME;
                    $province = str_replace(' ', '', $province);
                    $amphur = str_replace(' ', '', $amphur);
                    $tambon = str_replace(' ', '', $tambon);
                    $address = "ตำบล ".$tambon." อำเภอ ".$amphur." จังหวัด ".$province;
                    return $address;
                },
            ],
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
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; การย้ายทั้งหมด',
                'content' => $content,
                'active' => true,
            ],
            ['label'=>'<i class="fa fa-plus"></i>&nbsp; เพิ่มใหม่', 'url' => Url::to(['create'])]
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