<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\modules\registrationderegistration\models\Rdperson;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdemployerrepresentative */
/* @var $form yii\widgets\ActiveForm */

IF(ISSET($_POST['id']))
    $model->employer_id=$_POST['id'];
?>

<div class="rdemployerrepresentative-form">

    <?php $form = ActiveForm::begin(); ?>

 <div class='row'> 
 <div class="col-md-3">
 <?= $form->field($model, 'person_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Rdperson::find()->all(),'id','nid'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select person   ',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>        
 </div>
 <div class="col-md-3"> 
 <?= $form->field($model, 'employer_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Rdemployer::find()->all(),'id','companyName'),
                            'readonly' => true,
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select establishment',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>     
 </div>
 <div class="col-md-3"> 
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
 <div class="col-md-3">  
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
 </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
