<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\socialdialogue\models\Socialtradeunion */
?>
<div class="socialtradeunion-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'tradeUnionName',
            'federationAffiliation.federation',
            'tradeUnionStartDate',
            'village.village',
            'tradeUnionRepresentativeNames',
            'tradeUnionRepresentativePhone',
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'registeredByMIFOTRA_id',
            'label'=>'Registered by MIFOTRA',
            'value'=>$model->registeredByMIFOTRA->noyes,            
            ],
            // 'createdBy',
            // 'createdOn',
            // 'deleteFlag',
            // 'deleteBy',
            // 'deleteOn',
            // 'deleteReason:ntext',
            // 'updatedBy',
            // 'updatedOn',
        ],
    ]) ?>

</div>
