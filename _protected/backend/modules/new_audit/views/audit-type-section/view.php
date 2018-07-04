<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditTypeSection */
?>
<div class="audit-type-section-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'audit_id',
            'section_id',
            'created_by',
            'created_on',
        ],
    ]) ?>

</div>
