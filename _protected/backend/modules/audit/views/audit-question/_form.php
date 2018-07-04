<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\audit\models\AuditModule;
use backend\modules\audit\models\AuditSection;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audit-question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'module_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(AuditModule::find()->all(),'id','module'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder'=>'Select module',    
        ],
        'language' => 'en',
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>

    <?= $form->field($model, 'section_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(AuditSection::find()->all(),'id','section'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder'=>'Select section',    
        ],
        'language' => 'en',
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?php //echo $form->field($model, 'created_by')->textInput() ?>

    <?php //echo $form->field($model, 'created_on')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
