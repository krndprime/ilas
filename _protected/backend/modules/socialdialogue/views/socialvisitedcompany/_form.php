<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\modules\socialdialogue\models\Socialtradeunion;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Snoyes;


/* @var $this yii\web\View */
/* @var $model backend\modules\socialdialogue\models\Socialvisitedcompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="socialvisitedcompany-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class='row'>
    <div class="col-md-4">
    <?= $form->field($model, 'company_id')->widget(select2::classname(),[
                                'data'=>ArrayHelper::map(Rdemployer::find()->all(),'id','companyName'),
                                'theme' => Select2::THEME_KRAJEE, 
                                'options'=>[
                                    'placeholder'=>'Select Establishment',                                
                                ],
                                'language' => 'en',
                                'pluginOptions'=>['alloweClear'=>true],
                                ]); 
                                ?>  
    </div>
    <div class="col-md-4">
     <?= $form->field($model, 'tradeUnion_id')->widget(select2::classname(),[
                                'data'=>ArrayHelper::map(Socialtradeunion::find()->all(),'id','tradeUnionName'),
                                'theme' => Select2::THEME_KRAJEE, 
                                'options'=>[
                                    'placeholder'=>'Select trade union',                                
                                ],
                                'language' => 'en',
                                'pluginOptions'=>['alloweClear'=>true],
                                ]); 
                                ?>    
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'startDate')->widget(
            DatePicker::className(), [
            // inline too, not bad
             'inline' => false, 
             // modify template for custom rendering
            // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
            ]);

        ?>   
    </div>
    </div>

    <div class='row'>
    <div class="col-md-4">
    <?= $form->field($model, 'endDate')->widget(
            DatePicker::className(), [
            // inline too, not bad
             'inline' => false, 
             // modify template for custom rendering
            // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
            ]);

        ?>  
    </div>
    <div class="col-md-4"> 
     <?= $form->field($model, 'numberOfFemaleMember')->textInput() ?>   
    </div>
    <div class="col-md-4"> 
    <?= $form->field($model, 'numberOfMaleMember')->textInput() ?>   
    </div>
    </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
