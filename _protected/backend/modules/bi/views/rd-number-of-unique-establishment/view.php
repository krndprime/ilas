<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\bi\models\RdNumberOfUniqueEstablishment */
?>
<div class="rd-number-of-unique-establishment-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'registrationYear',
            'registrationQuarter',
            'province',
            'district',
            'geosector',
            'cell',
            'village',
            'employerType',
            'ownership',
            'employerStatus',
            'numberOfEmployer',
            'numberOfFemaleEmployee',
            'numberOfMaleEmployee',
        ],
    ]) ?>

</div>
