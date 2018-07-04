<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use backend\models\SLevel;
use backend\models\SInstitution;

use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = Yii::t('rbac-admin', 'Signup');
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['user/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>
    <?= Html::errorSummary($model)?>
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'firstName') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'lastName') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'username') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'email') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'phone') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'level_id')->widget(select2::classname(),[
                'data'=>ArrayHelper::map(SLevel::find()->all(),'id','level'),
                'theme' => Select2::THEME_KRAJEE, 
                'options'=>[
                    'placeholder' => 'Select level',
                ],
                'language' => 'en',
                'pluginOptions'=>['alloweClear'=>true],
                ])->label('Level');
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'institution_id')->widget(select2::classname(),[
                'data'=>ArrayHelper::map(SInstitution::find()->all(),'id','institution'),
                'theme' => Select2::THEME_KRAJEE, 
                'options'=>[
                    'placeholder' => 'Select institution',
                ],
                'language' => 'en',
                'pluginOptions'=>['alloweClear'=>true],
                ])->label('Institution');
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
    </div>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('rbac-admin', 'Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
