<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditSection */
?>
<div class="audit-section-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'section',
            'module_id',
        ],
    ]) ?>

</div>
