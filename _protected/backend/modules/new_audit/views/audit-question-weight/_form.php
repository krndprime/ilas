<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\modules\audit\models\AuditQuestion;
use backend\modules\audit\models\SActive;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditQuestionWeight */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audit-question-weight-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'question_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(AuditQuestion::find()->all(),'id','question'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder'=>'Select question',    
        ],
        'language' => 'en',
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'active_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(SActive::find()->all(),'id','status'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder'=>'Select status',    
        ],
        'language' => 'en',
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>

    <?php //echo $form->field($model, 'created_by')->textInput() ?>

    <?php //echo $form->field($model, 'created_on')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
