<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Schildtargetgroup;
use backend\models\Sgeosector;
use backend\models\Schidorganiser;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childawarenesscampaign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="childawarenesscampaign-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class='row'>     
    <div class="col-md-6">
    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>        
    </div>
    <div class="col-md-6">
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
    <div class="col-md-6">
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
    <div class="col-md-6">
    <?= $form->field($model, 'targetGroup_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Schildtargetgroup::find()->all(),'id','group'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select target group',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>        
    </div>
    </div>

    <div class='row'>     
    <div class="col-md-6">
    <?= $form->field($model, 'expectedNumberOfParticipants')->textInput() ?>        
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'geosector_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sgeosector::find()->all(),'id','sector'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select sector',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>       
    </div>
    </div>

    <div class='row'>     
    <div class="col-md-6">
    <?= $form->field($model, 'orgernisor_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Schidorganiser::find()->all(),'id','organiser'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select organiser',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
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
