<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\modules\socialdialogue\models\Socialfederation;
use backend\models\Snoyes;
use backend\models\Sprovince;
use backend\models\Sdistrict;
use backend\models\Sgeosector;
use backend\models\Scell;
use backend\models\Svillage;

/* @var $this yii\web\View */
/* @var $model backend\modules\socialdialogue\models\Socialtradeunion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="socialtradeunion-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class='row'>
    <div class="col-md-4">
    <?= $form->field($model, 'tradeUnionName')->textInput(['maxlength' => true]) ?>    
    </div>
     <div class="col-md-4">
      <?= $form->field($model, 'federationAffiliation_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Socialfederation::find()->all(),'id','federation'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select federation',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>   
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'tradeUnionStartDate')->widget(
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
<div class="col-md-4" id='province' style='display:block'>
 <?= $form->field($model, 'province_id')->widget(select2::classname(),[
                        'data'=>ArrayHelper::map(Sprovince::find()->all(),'id','province'),
                        'theme' => Select2::THEME_KRAJEE, 
                        'options'=>[
                            'placeholder'=>'Select province',
                            'onchange'=>'
                                
                                $.post("'.Url::to(['../sdistrict/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                     $("select#socialtradeunion-district_id" ).html(data);
                                });'
                        ],
                        'language' => 'en',
                        'pluginOptions'=>['alloweClear'=>true],
                        ]);
?>
</div>   
 <div class="col-md-4" id='district' style='display:block'>
 <?= $form->field($model, 'district_id')->widget(select2::classname(),[
'data'=>ArrayHelper::map(Sdistrict::find()->where('province_id=0')->all(),'id','district'),
'theme' => Select2::THEME_KRAJEE, 
'options'=>[
    'placeholder'=>'Select district',
    'onchange'=>'
         $.post("'.Url::to(['../sgeosector/lists', 'id'=> '']).'"+$(this).val(),function(
         data){
             $("select#socialtradeunion-sector_id" ).html(data);
        });'
],
'language' => 'en',
'pluginOptions'=>['alloweClear'=>true],
]); 
?>      
 </div> 
 <div class="col-md-4" id='sector' style='display:block'> 
 <?= $form->field($model, 'sector_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sgeosector::find()->where('district_id=0')->all(),'id','sector'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select sector',
                                'onchange'=>'
                                    $.post("'.Url::to(['../scell/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                         $("select#socialtradeunion-cell_id" ).html(data);
                                    });'
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>     
 </div> 
</div>
<div class='row'>
<div class="col-md-4" id='cell' style='display:block'>
 <?= $form->field($model, 'cell_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Scell::find()->where('sector_id=0')->all(),'id','cell'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select cell',
                                'onchange'=>'
                                    $.post("'.Url::to(['../svillage/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                         $("select#socialtradeunion-village_id" ).html(data);
                                    });'
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>    
 </div> 
 <div class="col-md-4">
 <?= $form->field($model, 'village_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Svillage::find()->where('cell_id=0')->all(),'id','village'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select village',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>  
 </div>
 <div class="col-md-4"> 
    <?= $form->field($model, 'tradeUnionRepresentativeNames')->textInput(['maxlength' => true]) ?>   
    </div>
 </div>
 <div class='row'>    
     <div class="col-md-4"> 
      <?= $form->field($model, 'tradeUnionRepresentativePhone')->textInput(['maxlength' => true]) ?>   
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'registeredByMIFOTRA_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Snoyes::find()->all(),'id','noyes'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select the answer',                                
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
