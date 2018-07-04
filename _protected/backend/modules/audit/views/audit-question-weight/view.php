<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditQuestionWeight */
?>
<div class="audit-question-weight-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'question.question',
            'weight',
            'active.status',
            //'created_by',
            //'created_on',
        ],
    ]) ?>

</div>
