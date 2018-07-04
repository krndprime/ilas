<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\modules\audit\models\AuditSection;
use backend\modules\audit\models\SActive;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditAudit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audit-audit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'month')->textInput() ?>

    <?php //echo $form->field($model, 'created_by')->textInput() ?>

    <?php //echo $form->field($model, 'created_on')->textInput() ?>

    <?= $form->field($model, 'section')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(AuditSection::find()->all(),'id','section'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder' => 'Select section',
            'multiple' => true,
        ],
        'language' => 'en',
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>

    <?= $form->field($model, 'status_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(SActive::find()->all(),'id','status'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder' => 'Select status',
        ],
        'language' => 'en',
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
