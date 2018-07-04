<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sdesease */
?>
<div class="sdesease-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'injurycause_id',
            'desease',
        ],
    ]) ?>

</div>
