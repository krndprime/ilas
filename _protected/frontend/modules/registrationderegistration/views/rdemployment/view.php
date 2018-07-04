<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdemployment */
?>
<div class="rdemployment-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'person_id',
            'employer_id',
            'occupation_id',
            'experienceInThisOccupation',
            'startDate',
            'endDate',
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
