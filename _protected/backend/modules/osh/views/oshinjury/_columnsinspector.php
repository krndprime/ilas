<?php
use yii\helpers\Url;
use yii\helpers\Html;

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
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'employee_id',
    // ],
    [
        'attribute'=>'employee_id',
        'label'=>'Employee firstname',
        'value'=>'employee.firstName',
    ],
    [
        'attribute'=>'employee_id',
        'label'=>'Employee lastname',
        'value'=>'employee.lastName',
    ],
    [
        'attribute'=>'injuryType_id',
        'value'=>'injuryType.type',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'frequency_id',
    ],
    [
        'attribute'=>'desease_id',
        'value'=>'desease.desease',
    ],
    [
        'attribute'=>'injuryCategory_id',
        'value'=>'injuryCategory.category',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'partOfTheBody_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'cause_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'oshTrainingRelatedToOccupation_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'injuryDate',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'returnToWorkDate',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'affiliatedToRssb_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'rssbNumber',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'observation',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'createdBy',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'createdOn',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'deletedFlag',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'deletedBy',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'deletedOn',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'deleteReason',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updatedBy',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updatedOn',
    // ],
    [
        'class' => 'yii\grid\ActionColumn',
        'template'=>'{update}',
        'buttons' => [
        'update' => function ($url, $model) {

        return Html::a('<span class="glyphicon glyphicon-arrow-up">Action</span>', Yii::$app->urlManager->createUrl(['osh/oshoshinjuryviewed/create','id' => $model->id]), [
                        'title' => Yii::t('yii', 'Edit'),
                        // 'role'=>'modal-remote',
                        // 'title'=>'Reply',
                        // 'data-toggle'=>'tooltip',
                        'data-pjax' => '0',
                      ]);                              
                    },

        ],
    ],

    

];   