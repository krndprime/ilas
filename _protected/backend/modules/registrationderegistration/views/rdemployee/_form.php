<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdemployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rdemployee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'person_id')->textInput() ?>

    <?= $form->field($model, 'employer_id')->textInput() ?>

    <?= $form->field($model, 'occupation_id')->textInput() ?>

    <?= $form->field($model, 'experienceInThisOccupation')->textInput() ?>

    <?= $form->field($model, 'startDate')->textInput() ?>

    <?= $form->field($model, 'endDate')->textInput() ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'createdOn')->textInput() ?>

    <?= $form->field($model, 'deletedFlag')->textInput() ?>

    <?= $form->field($model, 'deletedBy')->textInput() ?>

    <?= $form->field($model, 'deletedOn')->textInput() ?>

    <?= $form->field($model, 'deleteReason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'updatedBy')->textInput() ?>

    <?= $form->field($model, 'updatedOn')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
