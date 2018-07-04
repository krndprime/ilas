<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\inspection\models\InspectionAnswer */

$this->title = Yii::t('app', 'Inspection Answers');
$this->params['breadcrumbs'][] = ['label' => 'Inspection', 'url' => ['/inspection/inspection-inspection/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="inspection-answer-create">
    <?= $this->render('_form_2', [
        'model' => $model,
    ]) ?>
</div>
