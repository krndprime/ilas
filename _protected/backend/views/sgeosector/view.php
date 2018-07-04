<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sgeosector */
?>
<div class="sgeosector-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sector',
            'district_id',
        ],
    ]) ?>

</div>
