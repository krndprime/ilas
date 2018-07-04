<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

use backend\modules\inspection\models\InspectionSection;
use backend\modules\inspection\models\InspectionInspection;
use backend\modules\inspection\models\RdEmployer;
use backend\modules\inspection\models\InspectionQuestion;
use backend\modules\inspection\models\InspectionOption;
use backend\modules\inspection\models\SIsicr4Level1;
use backend\modules\inspection\models\InspectionSalmodality;
use backend\modules\inspection\models\InspectionWorkhours;
use backend\models\Snoyes;

/* @var $this yii\web\View */
/* @var $model backend\modules\inspection\models\InspectionAnswer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspection-answer-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'inspection_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(InspectionInspection::find()->all(),'id','name'),
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
        'data'=>ArrayHelper::map(InspectionQuestion::find()->all(),'id','question'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder'=>'Select question',    
        ],
        'language' => 'en',
        'disabled' => TRUE,
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>

    <?= $form->field($model, 'option_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(InspectionOption::find()->all(),'id','option'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder'=>'Select option',    
        ],
        'language' => 'en',
        'disabled' => TRUE,
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>

    <?php echo $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <?php //echo $form->field($model, 'created_by')->textInput() ?>

    <?php //echo $form->field($model, 'created_on')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
