<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\modules\socialdialogue\models\Socialtradeunion;

/* @var $this yii\web\View */
/* @var $model backend\modules\socialdialogue\models\Socialparticipatingtradeunion */
/* @var $form yii\widgets\ActiveForm */


IF(ISSET($_POST['id']))
    $model->collectiveBargainingAgreement_id=$_POST['id'];
?>

<div class="socialparticipatingtradeunion-form">

    <?php $form = ActiveForm::begin(); ?>

 <fieldset class="scheduler-border">
 <legend class="scheduler-border" >Trade union participated</legend>
    <div class='row'>
    <div class="col-md-4"> 
    <?= $form->field($model, 'collectiveBargainingAgreement_id')->textInput() ?>   	
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'tradeunion_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Socialtradeunion::find()->all(),'id','tradeUnionName'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select status',
                                'multiple' => true,                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>    	
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
