<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\bi\models\RdNumberOfEstablishmentByEcosector */
?>
<div class="rd-number-of-establishment-by-ecosector-view">
 
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
            'ecosector',
            'employerStatus',
            'numberOfEmployer',
            'numberOfFemaleEmployee',
            'numberOfMaleEmployee',
        ],
    ]) ?>

</div>
