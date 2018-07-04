<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sownership */
?>
<div class="sownership-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'employertype_id',
            'ownership',
        ],
    ]) ?>

</div>
