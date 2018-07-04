<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdemployer */

?>
<div class="rdemployer-create">
    <?= $this->render('_branchform', [
        'model' => $model,
        'address' => $address,
        'person' => $person,
        'employeenumbers'=>$employeenumbers,
        'employerstatus'=>$employerstatus,
        'representative'=> $representative,
        'modelseconomicsector' => $modelseconomicsector,
       'dataFromEmployer'=>$dataFromEmployer
    ]) ?>
</div>
