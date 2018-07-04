<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sfrequency */
?>
<div class="sfrequency-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'frequency',
        ],
    ]) ?>

</div>
