<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sinjurycause */
?>
<div class="sinjurycause-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cause',
        ],
    ]) ?>

</div>
