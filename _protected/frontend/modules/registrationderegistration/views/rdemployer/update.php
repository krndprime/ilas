<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdemployer */
?>
<div class="rdemployer-update">

    <?= $this->render('_form', [
        'model' => $model,
        'address' => $address,
        'person' => $person,
        'employeenumbers'=>$employeenumbers,
        'employerstatus'=>$employerstatus,
        'representative'=> $representative,
        'modelseconomicsector' => $modelseconomicsector,
    ]) ?>

</div>
