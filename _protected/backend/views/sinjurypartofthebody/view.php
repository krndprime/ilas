<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sinjurypartofthebody */
?>
<div class="sinjurypartofthebody-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'partOfTheBody',
        ],
    ]) ?>

</div>
