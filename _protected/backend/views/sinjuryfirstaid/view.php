<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sinjuryfirstaid */
?>
<div class="sinjuryfirstaid-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firstAid',
        ],
    ]) ?>

</div>
