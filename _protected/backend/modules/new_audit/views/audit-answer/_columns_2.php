<?php
use yii\helpers\Url;

return [
//    [
//        'class' => 'kartik\grid\CheckboxColumn',
//        'width' => '20px',
//    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'audit_id',
//        'value' => 'audit.name',
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'establishment_id',
        'value' => 'establishment.companyName',
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'question_id',
//        'value' => 'question.question',
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'answer',
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'created_by',
//    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_on',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{view}',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) {
                $aid=$model->audit_id;
                $eid=$model->establishment_id;
                
                IF($action==='view')
                {
                    $action='index';
                    return Url::to([$action,'aid'=>$aid,'id'=>$eid]);
                }
                else
                {
                    return Url::to([$action,'aid'=>$aid,'id'=>$eid]);
                }
        },
        //'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   