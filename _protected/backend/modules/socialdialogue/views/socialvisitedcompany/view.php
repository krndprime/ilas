<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\socialdialogue\models\Socialvisitedcompany */
?>
<div class="socialvisitedcompany-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'company_id',
            'label'=>'Establishment',
            'value'=>$model->company->companyName,            
            ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'tradeUnion_id',
            'label'=>'Trade union',
            'value'=>$model->tradeUnion->tradeUnionName,            
            ],
            'startDate',
            'endDate',
            'numberOfFemaleMember',
            'numberOfMaleMember',
            // 'createdBy',
            // 'createdOn',
            // 'deletedFlag',
            // 'deletedBy',
            // 'deletedOn',
            // 'deleteReason:ntext',
            // 'updatedBy',
            // 'updatedOn',
        ],
    ]) ?>

</div>
