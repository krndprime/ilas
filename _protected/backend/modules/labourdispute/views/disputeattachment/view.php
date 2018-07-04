<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\labourdispute\models\Disputeattachment */
?>
<div class="disputeattachment-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'disputeNote_id',
            'file',
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
