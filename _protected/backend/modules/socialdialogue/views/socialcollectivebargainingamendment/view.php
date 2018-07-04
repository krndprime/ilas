<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\socialdialogue\models\Socialcollectivebargainingamendment */
?>
<div class="socialcollectivebargainingamendment-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'collectiveBargainingAgreement_id',
            'label'=>'Collective bargaining agreement',
            'value'=>$model->collectiveBargainingAgreement->collectiveBargainingAgreement,            
            ],
            'collectiveBargainingAmendment',
            'startDate',
            'endDate',
            'Observation:ntext',
            // 'createdBy',
            // 'createdOn',
            // 'deletedFlag',
            // 'deletedBy',
            // 'deletedOn',
            // 'deleteReason',
            // 'updatedBy',
            // 'updatedOn',
        ],
    ]) ?>

</div>
