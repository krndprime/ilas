<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childussdapproval */
?>
<div class="childussdapproval-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'childUssd_id',
            'comment:ntext',
            'childUssdAction_id',
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
