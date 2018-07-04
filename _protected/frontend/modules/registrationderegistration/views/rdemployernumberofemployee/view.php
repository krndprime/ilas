<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdemployernumberofemployee */
?>
<div class="rdemployernumberofemployee-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'employer_id',
            'numberOfFemaleEmployee',
            'numberOfMaleemployee',
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
