<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\labourdispute\models\Disputenote */
/* @var $form yii\widgets\ActiveForm */

IF(ISSET($_POST['id']))
    $model->case_id=$_POST['id'];
?>


<div class="disputenote-form">

<?php $form = ActiveForm::begin(); ?>
 <div class='row'>    
  <div class="col-md-4"> 
  <?= $form->field($model, 'case_id')->textInput(['maxlength' => true,'readonly' => true]) ?>     
  </div>
  <div class="col-md-4">
  <?= $form->field($model, 'summoningDate')->widget(
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
    <?= $form->field($model, 'nextSummoningDate')->widget(
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
  <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>      
  </div>
  </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
