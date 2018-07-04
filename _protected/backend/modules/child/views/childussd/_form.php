<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Ssex;
use backend\models\Sussdstatus;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childussd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="childussd-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class='row'>     
    <div class="col-md-6"> 
    <?= $form->field($model, 'reporter_id')->textInput() ?>
    </div>
    <div class="col-md-6"> 
     <?= $form->field($model, 'childNames')->textInput(['maxlength' => true]) ?>
    </div>
    </div>

    <div class='row'>     
    <div class="col-md-6"> 
    <?= $form->field($model, 'dateOfBirth')->widget(
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
    <?= $form->field($model, 'sex_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Ssex::find()->all(),'id','sex'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select sex',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?> 
    </div>
    </div>

    <div class='row'>
    <div class="col-md-6">
    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>        
    </div>     
    <div class="col-md-6">
    <?= $form->field($model, 'employerNames')->textInput(['maxlength' => true]) ?> 
    </div>
    
    </div>
    <!-- <div class='row'>
    <div class="col-md-6">
    <?= $form->field($model, 'status_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sussdstatus::find()->all(),'id','status'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select ussd status',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?> 
    </div> 
    </div> -->
    
    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
