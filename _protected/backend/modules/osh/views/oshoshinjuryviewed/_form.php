<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Sinjuryfirstaid;

/* @var $this yii\web\View */
/* @var $model backend\modules\osh\models\Oshoshinjuryviewed */
/* @var $form yii\widgets\ActiveForm */
?>

<font color="0000FF"><h4>Report on OSH case of: <?= $dataFromOshinjury->employee->firstName.' '.$dataFromOshinjury->employee->lastName;?></h4></font><br>

<div class="oshoshinjuryviewed-form">

<?php $form = ActiveForm::begin(); ?>

<div class='row'>
    <div class="col-md-4">
    <?= $form->field($model, 'oshinjury_id')->textInput(['value'=>$dataFromOshinjury->id,'readonly' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'actiontaken_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sinjuryfirstaid::find()->where(['IN','id',[5, 6,7,8]])->all(),'id','firstAid'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select action',
                                'multiple' => true, 
                                'onchange'=>' 
                                   var id = document.getElementById("oshoshinjuryviewed-actiontaken_id").value;
                                   if(id == 8){
                                    $("#fine" ).show();

                                    }else{

                                    $("#fine" ).hide();
                                    }'                             
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>
    </div>
    <div class="col-md-4" id='fine' style='display:none'>
    <?= $form->field($model, 'fineAmount')->textInput(['maxlength' => true]) ?>
    </div>
    </div>

    <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?>


  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
