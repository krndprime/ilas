<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Spreventivemeasure */
?>
<div class="spreventivemeasure-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'preventivemeasure',
        ],
    ]) ?>

</div>
