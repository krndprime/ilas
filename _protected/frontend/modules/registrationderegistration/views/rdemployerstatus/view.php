<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdemployerstatus */
?>
<div class="rdemployerstatus-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'employer_id',
            'employerStatus_id',
            'statusEffectiveDate',
            'createdBy',
            'createdOn',
            'deletedFlag',
            'deletedBy',
            'deletedOn',
            'deleteReason:ntext',
            'updatedBy',
            'updatedOn',
        ],
    ]) ?>

</div>
