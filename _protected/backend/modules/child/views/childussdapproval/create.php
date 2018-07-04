<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childussdapproval */

?>
<div class="childussdapproval-create">
    <?= $this->render('_form', [
        'model' => $model,
        'dataFromUSSD'=>$dataFromUSSD,

        'childcase' => $childcase,
        'child' => $child,
        'employment' => $employment,
        'childfound' => $childfound,
        'establishment' => $establishment,
        'address' => $address,
        'person' => $person,
        'representative'=>$representative,
        'employeenumbers'=>$employeenumbers,
        'employerstatus'=>$employerstatus,
        'modelseconomicsector'=>(empty($modelseconomicsector)) ? [new Rdemployerecosector ]: $modelseconomicsector
    ]) ?>
</div>
