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
    [
        'attribute'=>'reporter_id',
        'value'=>'reporter.username',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'childNames',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'dateOfBirth',
    ],
    [
        'attribute'=>'sex_id',
        'value'=>'sex.sex',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'location',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'employerNames',
    // ],
    [
        'attribute'=>'status_id',
        'value'=>'status.status',
    ],
    [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}',
                'buttons' => [
                'update' => function ($url, $model) {

                return Html::a('<span class="glyphicon glyphicon-arrow-up">Report</span>', Yii::$app->urlManager->createUrl(['child/childussdapproval/create','id' => $model->id]), [
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


    