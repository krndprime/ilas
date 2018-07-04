<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\inspection\models\InspectionQuestion */
?>
<div class="inspection-question-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'question:ntext',
            'section.section',
        ],
    ]) ?>

</div>
