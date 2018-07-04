<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Schidorganiser */
?>
<div class="schidorganiser-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'organiser',
        ],
    ]) ?>

</div>
