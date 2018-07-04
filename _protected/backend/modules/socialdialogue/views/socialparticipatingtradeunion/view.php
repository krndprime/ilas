<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\socialdialogue\models\Socialparticipatingtradeunion */
?>
<div class="socialparticipatingtradeunion-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'collectiveBargainingAgreement_id',
            'label'=>'Establishment',
            'value'=>$model->collectiveBargainingAgreement->company->companyName,            
            ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'collectiveBargainingAgreement_id',
            'label'=>'Collective bargaining agreement',
            'value'=>$model->collectiveBargainingAgreement->collectiveBargainingAgreement,            
            ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'tradeunion_id',
            'label'=>'Trade union',
            'value'=>$model->tradeunion->tradeUnionName,            
            ],
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
