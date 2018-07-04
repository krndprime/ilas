<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childcase */
?>
<div class="childcase-update">

    <?= $this->render('_form', [
        'model' => $model,
        'child' => $child,
        'employment' => $employment,
        'childfound' => $childfound,

		'establishment' => $establishment,
        'address' => $address,
        'person' => $person,
        'employeenumbers'=>$employeenumbers,
        'employerstatus'=>$employerstatus,
        'representative'=> $representative,
        'modelseconomicsector' => $modelseconomicsector,
    ]) ?>

</div>
