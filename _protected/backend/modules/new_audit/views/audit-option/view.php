<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditOption */
?>
<div class="audit-option-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'option',
            'question.question',
            'datatype.datatype',
        ],
    ]) ?>

</div>
