<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audit-section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'section')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'module_id')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
