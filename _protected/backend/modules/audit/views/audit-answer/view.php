<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditAnswer */
?>
<div class="audit-answer-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'audit.name',
            'establishment.companyName',
            'question.question',
            'answer',
//            'created_by',
//            'created_on',
        ],
    ]) ?>

</div>
