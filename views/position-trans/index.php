<?php

use kartik\tabs\TabsX;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PositionTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ตำแหน่งทางคณะสงฆ์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-trans-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'showOnEmpty' => true,
        'summary' => '',
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn', 'header' => '',],

            //'idpos',
            //'idperson',
            //'position_id',
            [
                'attribute' => 'position_id',
                'filter' => ArrayHelper::map(\app\models\Position::find()->all(), 'idposition', 'positionname'),
                'value' => function($model){
                    return $model->position->positionname;
                }
            ],
            'positiondate',
            'temple',
            ['attribute' => 'address_id',
                'value' => function ($model) {
                    $province_id = $model->address->province_id;
                    $amphur_id = $model->address->amphur_id;
                    $tambol_id = $model->address->tambol_id;
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
            ['attribute' => 'attachfile',
                'label' => 'ไฟล์แนบ',
                'contentOptions' => [ 'style' => 'width:5%', 'class' => 'text-center'],
                'format' => 'html',
                'value' => function ($model) {
                    if($model->attachfile != null){
                        return $model->getAttachFile($model->person->idperson, $model->attachfile);
                    }else{
                        return "<code>ไม่มี</code>";
                    }
                },
            ],
            //'remark',
            //'attachfile',
            //'address_id',

            ['class' => 'kartik\grid\ActionColumn',
                'header' => '',
                'template' => '{update}&nbsp{delete}',
            ],
        ],
        'resizableColumns' => false,
        'responsiveWrap' => false,
    ]); ?>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-product-hunt"></i>&nbsp;<?= $this->title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $items = [
            [
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; ตำแหน่งทางคณะสงฆ์ทั้งหมด',
                'content' => $content,
                'active' => true,
            ],
            ['label'=>'<i class="fa fa-plus"></i>&nbsp; เพิ่มตำแหน่งที่ได้รับ', 'url' => Url::to(['create'])]
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