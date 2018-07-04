<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\modules\socialdialogue\models\Socialcelloctivebargainingagreement;

/* @var $this yii\web\View */
/* @var $model backend\modules\socialdialogue\models\Socialcollectivebargainingamendment */
/* @var $form yii\widgets\ActiveForm */

IF(ISSET($_POST['id']))
    $model->collectiveBargainingAgreement_id=$_POST['id'];
?>


<div class="socialcollectivebargainingamendment-form">

    <?php $form = ActiveForm::begin(); ?>
 <fieldset class="scheduler-border">
 <legend class="scheduler-border" >Agreement amendment</legend>
    <div class='row'>
    <div class="col-md-4"> 
    <?= $form->field($model, 'collectiveBargainingAgreement_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Socialcelloctivebargainingagreement::find()->all(),'id','collectiveBargainingAgreement'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select agreement',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>      
    </div>
    <div class="col-md-4">   
    <?= $form->field($model, 'collectiveBargainingAmendment')->textInput(['maxlength' => true]) ?>     
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
    <?= $form->field($model, 'Observation')->textarea(['rows' => 6]) ?>      
    </div>    
    </div> 
    </fieldset>  
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
