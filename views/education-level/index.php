<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EducationLevelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ระดับการศึกษา';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-level-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'showOnEmpty' => false,
        'summary' => '',
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn', 'header' => '',],

            //'level_id',
            'level_name',
            //'level_type',
            ['format' => 'html',
                'attribute' => 'level_type',
                'value' => function ($model) {
                    return '<code>' . $model->getEducationLevel($model->level_type) . '</code>';
                },
            ],

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
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; ระดับการศึกษาทั้งหมด',
                'content' => $content,
                'active' => true,
            ],
            ['label' => '<i class="fa fa-plus"></i>&nbsp; เพิ่มระดับการศึกษา', 'url' => Url::to(['create'])]
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
