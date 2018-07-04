<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Srelationship */
?>
<div class="srelationship-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'relationship',
        ],
    ]) ?>

</div>
