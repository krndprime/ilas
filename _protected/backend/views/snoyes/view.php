<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Snoyes */
?>
<div class="snoyes-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'noyes',
        ],
    ]) ?>

</div>
