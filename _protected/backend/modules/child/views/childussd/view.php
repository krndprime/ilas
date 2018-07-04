<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childussd */
?>
<div class="childussd-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'reporter.username',
            'childNames',
            'dateOfBirth',
            'sex.sex',
            'location',
            'employerNames',
            'status.status',
            // 'reported',
        ],
    ]) ?>

</div>
