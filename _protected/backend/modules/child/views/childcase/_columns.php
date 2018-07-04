<?php
use yii\helpers\Url;
return [
    // [
    //     'class' => 'kartik\grid\CheckboxColumn',
    //     'width' => '20px',
    // ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'attribute'=>'childEmployment_id',
        'label'=>'child firstname',
        'value'=>'childEmployment.child.childFirstName',
    ],
    [
        'attribute'=>'childEmployment_id',
        'label'=>'child lastname',
        'value'=>'childEmployment.child.childLastName',
    ],
    [
        'attribute'=>'childEmployment_id',
         'label'=>'Establishment',
        'value'=>'childEmployment.formalemployer.companyName',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'childLabourForm_id',
        'value'=>'childLabourForm.form',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'childLabourType_id',
        'value'=>'childLabourType.type',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'caseStatus_id',
        'value'=>'caseStatus.status',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'actionTaken_id',
        'value'=>'actionTaken.action',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'recommendation',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'sanction_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'fineAmount',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'reportingDate',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'actionTakenDate',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ussd_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'createdBy',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'createdOn',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   