<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditQuestion */
?>
<div class="audit-question-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'question:ntext',
            'section.section',
            'order',
//            'created_by',
//            'created_on',
        ],
    ]) ?>

</div>
