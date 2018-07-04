<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\inspection\models\InspectionOption */
?>
<div class="inspection-option-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'option',
            'question.question',
            'datatype.datatype',
        ],
    ]) ?>

</div>
