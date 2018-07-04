<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\socialdialogue\models\Socialconfederation */
?>
<div class="socialconfederation-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'confederation',
            'startDate',
            'village.village',
            'confederationRepresentativeNames',
            'confederationRepresentativePhone',
            // 'createdBy',
            // 'createdOn',
            // 'deletedFrag',
            // 'deletedBy',
            // 'deletedOn',
            // 'deleteReason:ntext',
            // 'updatedBy',
            // 'updatedOn',
        ],
    ]) ?>

</div>
