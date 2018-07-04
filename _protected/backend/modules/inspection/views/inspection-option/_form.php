<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

use backend\modules\inspection\models\InspectionQuestion;
use backend\modules\inspection\models\SDatatype;

/* @var $this yii\web\View */
/* @var $model backend\modules\inspection\models\InspectionOption */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspection-option-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'option')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'question_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(InspectionQuestion::find()->all(),'id','question'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder'=>'Select question',    
        ],
        'language' => 'en',
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>
    
    <?= $form->field($model, 'datatype_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(SDatatype::find()->all(),'id','datatype'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder'=>'Select data type',    
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
