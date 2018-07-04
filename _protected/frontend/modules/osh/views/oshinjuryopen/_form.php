<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\osh\models\Oshinjuryopen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oshinjuryopen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middleName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'document_id')->textInput() ?>

    <?= $form->field($model, 'nid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->textInput() ?>

    <?= $form->field($model, 'dateOfBirth')->textInput() ?>

    <?= $form->field($model, 'sex_id')->textInput() ?>

    <?= $form->field($model, 'village_id')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rssbNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employer_id')->textInput() ?>

    <?= $form->field($model, 'occupation_id')->textInput() ?>

    <?= $form->field($model, 'experienceInThisEstablishment')->textInput() ?>

    <?= $form->field($model, 'startDate')->textInput() ?>

    <?= $form->field($model, 'endDate')->textInput() ?>

    <?= $form->field($model, 'injuryType_id')->textInput() ?>

    <?= $form->field($model, 'frequency_id')->textInput() ?>

    <?= $form->field($model, 'desease_id')->textInput() ?>

    <?= $form->field($model, 'accident_id')->textInput() ?>

    <?= $form->field($model, 'injuryCategory_id')->textInput() ?>

    <?= $form->field($model, 'partOfTheBody_id')->textInput() ?>

    <?= $form->field($model, 'cause_id')->textInput() ?>

    <?= $form->field($model, 'oshTrainingRelatedToOccupation_id')->textInput() ?>

    <?= $form->field($model, 'injuryDate')->textInput() ?>

    <?= $form->field($model, 'returnToWorkDate')->textInput() ?>

    <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?>

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
