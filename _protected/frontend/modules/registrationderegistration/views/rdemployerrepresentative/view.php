<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdemployerrepresentative */
?>
<div class="rdemployerrepresentative-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'person_id',
            'employer_id',
            'startDate',
            'endDate',
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
