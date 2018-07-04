<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditAudit */
?>
<div class="audit-audit-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'year',
            [
                'attribute'=>'month',
                'format' => 'raw',
                'value' => function ($data){
                        return date('F', mktime(0, 0, 0,$data['month'], 10));
                },
            ],
//            'created_by',
//            'created_on',
            //'status_id',
        ],
    ]) ?>
    
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $sectionDataProvider,
            'filterModel' => $sectionSearchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_sectioncolumns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['inspection-type-section/create?id=1'],
                    ['role'=>'modal-remote','title'=> 'Create new Inspection Sections','class'=>'btn btn-default'])
//                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
//                    [
//                        'data-pjax'=>1, 
//                        'class'=>'btn btn-default', 
//                        'title'=>'Reset Grid'
//                    ]).
//                    '{toggleData}'.
//                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
//                'type' => 'primary', 
//                'heading' => '<i class="glyphicon glyphicon-list"></i> Inspection Sections listing',
//                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
//                'after'=>BulkButtonWidget::widget([
//                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
//                                ["bulk-delete"] ,
//                                [
//                                    "class"=>"btn btn-danger btn-xs",
//                                    'role'=>'modal-remote-bulk',
//                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
//                                    'data-request-method'=>'post',
//                                    'data-confirm-title'=>'Are you sure?',
//                                    'data-confirm-message'=>'Are you sure want to delete this item'
//                                ]),
//                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>

</div>
