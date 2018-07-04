<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\modules\audit\models\AuditAudit;
use backend\modules\audit\models\RdEmployer;
use backend\modules\audit\models\AuditSection;
use backend\modules\audit\models\AuditQuestion;
use backend\modules\audit\models\AuditOption;
use backend\modules\audit\models\SIsicr4Level1;
use backend\modules\audit\models\SWeight;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditAnswer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audit-answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        //Get inspection id from inspection-inspection/index
        IF(ISSET($_POST['id']))
            $aid=$_POST['id'];
        ELSE $aid=NULL;
    ?>
    
    
    
    <?= $form->field($model, 'audit_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(AuditAudit::find()->all(),'id','name'),
        'theme' => Select2::THEME_KRAJEE, 
//        'options'=>[
//            'placeholder'=>'Select inspection',    
//        ],
        'language' => 'en',
        'disabled' => TRUE,
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>

    <?= $form->field($model, 'establishment_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(RdEmployer::find()->all(),'id','companyName'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder'=>'Select establishment',    
        ],
        'language' => 'en',
        'disabled' => TRUE,
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>
    
    <?= $form->field($model, 'question_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(AuditQuestion::find()->all(),'id','question'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder'=>'Select question',    
        ],
        'language' => 'en',
        'disabled' => TRUE,
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>

    <?php echo $form->field($model, 'answer')->textInput() ?>

    <?php //echo $form->field($model, 'created_by')->textInput() ?>

    <?php //echo $form->field($model, 'created_on')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
