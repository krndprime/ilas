<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\bi\models\RdNumberOfEmployment */
?>
<div class="rd-number-of-employment-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'startEmploymentYear',
            'startEmploymentQuarter',
            'agegroup',
            'employeeProvince',
            'employeeDistrict',
            'employeeGeosector',
            'employeeCell',
            'employeeVillage',
            'employerType',
            'employerProvice',
            'employerDistrict',
            'employerGeosector',
            'employerCell',
            'employerVillage',
            'ownership',
            'ecosector',
            'employerStatus',
            'closingYear',
            'closingMonth',
            'occupation',
            'experienceagegroup',
            'numberOfEmployer',
            'numberOfFemaleEmployee',
            'numberOfMaleEmployee',
        ],
    ]) ?>

</div>
