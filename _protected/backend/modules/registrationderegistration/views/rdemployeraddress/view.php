<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdemployeraddress */
?>
<div class="rdemployeraddress-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'employer_id',
            'village_id',
            'emailAddress:email',
            'phoneNumber',
            'pobox',
            'physicalAddress',
            'CreatedBy',
            'CreatedOn',
            'deletedFlag',
            'deletedBy',
            'deletedOn',
            'deleteReason:ntext',
            'updatedBy',
            'updatedOn',
        ],
    ]) ?>

</div>
