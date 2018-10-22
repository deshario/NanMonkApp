<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EducationTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ประวัติการศึกษา';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = 'ทางโลก';
?>
<div class="education-trans-index">

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
            'place',
            'major',
            'year',
            'abbrev',
            //'transcriptname',
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