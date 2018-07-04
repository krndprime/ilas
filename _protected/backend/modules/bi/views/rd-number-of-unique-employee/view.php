<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\bi\models\RdNumberOfUniqueEmployee */
?>
<div class="rd-number-of-unique-employee-view">
 
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
            'numberOfFemaleEmployee',
            'numberOfMaleEmployee',
        ],
    ]) ?>

</div>
