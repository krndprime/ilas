<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Child */
?>
<div class="child-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'childFirstName',
            'childMiddleName',
            'childLastName',
            'dateOfBirth',
            'sex_id',
            'edulevel_id',
            'originDistrict_id',
            'originSector_id',
            'originCell_id',
            'originVillage_id',
            'guardianNames',
            'contactPhone',
            'relationship_id',
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
