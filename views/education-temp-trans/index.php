<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EducationTempTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ประวัติการศึกษา';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = 'ทางธรรม';
?>
<div class="education-temp-trans-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'showOnEmpty' => false,
        'summary' => '',
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn', 'header' => '',],

            //'idedu',
            //'idperson',
            //'education_level',
            ['attribute' => 'education_level',
                'value' => function ($model) {
                    return $model->educationLevel->education_name;
                },
            ],
            'temple',
            'place',
            //'placeprovince',
            ['attribute' => 'placeprovince',
                'value' => function ($model) {
                    $province_id = $model->placeprovince;
                    $province = \app\models\Province::find()->where('PROVINCE_ID = ' . $province_id)->one()->PROVINCE_NAME;
                    return $province;
                },
            ],
            ['attribute' => 'attachfile',
                'label' => 'ไฟล์แนบ',
                'contentOptions' => [ 'style' => 'width:5%', 'class' => 'text-center'],
                'format' => 'html',
                'value' => function ($model) {
                    if($model->attachfile != null){
                        return "<code>มี</code>";
                    }else{
                        return "<code>ไม่มี</code>";
                    }
                },
            ],
            //'attachfile',
            //'address',

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
        <h3 class="panel-title"><i class="fa fa-users"></i>&nbsp;<?= $this->title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $items = [
            [
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; ประวัติการศึกษาทั้งหมด',
                'content' => $content,
                'active' => true,
            ],
            ['label'=>'<i class="fa fa-plus"></i>&nbsp; เพิ่มประวัติ', 'url' => Url::to(['create'])]
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