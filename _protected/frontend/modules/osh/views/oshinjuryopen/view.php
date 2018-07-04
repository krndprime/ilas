<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\osh\models\Oshinjuryopen */
?>
<div class="oshinjuryopen-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firstName',
            'lastName',
            'middleName',
            'document_id',
            'nid',
            'country_id',
            'dateOfBirth',
            'sex_id',
            'village_id',
            'phone',
            'email:email',
            'rssbNumber',
            'employer_id',
            'occupation_id',
            'experienceInThisEstablishment',
            'startDate',
            'endDate',
            'injuryType_id',
            'frequency_id',
            'desease_id',
            'accident_id',
            'injuryCategory_id',
            'partOfTheBody_id',
            'cause_id',
            'oshTrainingRelatedToOccupation_id',
            'injuryDate',
            'returnToWorkDate',
            'observation:ntext',
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
