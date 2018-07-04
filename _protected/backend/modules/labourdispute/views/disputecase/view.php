<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\modules\registrationderegistration\models\Rdemployeraddress;

/* @var $this yii\web\View */
/* @var $model frontend\models\RelEducation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dispute case', 'url' => ['index']];


//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rel-education-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3" style="text-align: center">
                <span class="glyphicon glyphicon-home" style="font-size: 10em; color: #337AB7"></span>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-success">
                    <div class="panel-heading"><strong>Case basic information</strong></div>
                    <div class='panel-body'>
                        <div class="table-responsive">
                            <table class="table table-striped">                                
                                <tr>
                                    <th>Establishment: </th>
                                    <td><?= $model->employer->companyName;?></td>
                                </tr>
                                <tr>
                                    <th>Employee firstname: </th>
                                    <td><?= $model->employee->firstName; ?></td>
                                </tr>
                                <tr>
                                    <th>Employee lastname: </th>
                                    <td><?= $model->employee->lastName;?></td>
                                </tr>
                                <tr>
                                    <th>Trade union: </th>
                                    <td><?= $model->tradeUnion->tradeUnionName;?></td>
                                </tr>
                                
                                <tr>
                                    <th>Accuser: </th>
                                    <td><?= $model->accuser->accuser;?></td>
                                </tr>
                                <tr>
                                    <th>Case type: </th>
                                    <td><?= $model->casetype->casetype;?></td>
                                </tr>
                                <tr>
                                    <th>Description: </th>
                                    <td><?= $model->description;?></td>
                                </tr>
                                <tr>
                                    <th>Submission Date: </th>
                                    <td><?= $model->submissionDate;?></td>
                                </tr>
                                <tr>
                                    <th>Case status: </th>
                                    <td><?= $model->caseStatus->status;?></td>
                                </tr>
                                <tr>
                                    <th>Action taken: </th>
                                    <td><?= $model->disputeActionTaken_id;?></td>
                                </tr>
                                <tr>
                                    <th>Settlement date: </th>
                                    <td><?= $model->settlementDate;?></td>
                                </tr>
                                <tr>
                                    <th>Summoning date: </th>
                                    <td><?= $model->summoningDate;?></td>
                                </tr>
                                <tr>
                                    <th>Appearance date: </th>
                                    <td><?= $model->appearanceDate;?></td>
                                </tr>
                                <tr>
                                    <th>Actions: </th>
                                    <td>
                                    <?php $pk=$model['id']; ?>
                                    <?= Html::a('Update', ['disputecase/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['disputecase/delete', 'id' => $pk], [
                                        'class' => 'glyphicon glyphicon-trash',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </td>
                                </tr>                                
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading"><strong>Case notes</strong></div>
                    <div class='panel-body'>
                        <p>
                            <?= Html::a(
                                '<i class="glyphicon glyphicon-plus"></i>',
                                ['disputenote/create'],
                                [
                                    'role' => 'model-remote',
                                    'title' => 'Add new agreement',
                                    'class' => 'btn btn-default',
                                    'data-method' => 'POST',
                                    'data-params' => [
                                    'id'=>$model->id,
                                    ]
                                ]
                            ) ?>
                        </p>
                        <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>                               
                                <th>Establishment</th>
                                <th>Employee firstname</th>
                                <th>Employee lastname</th>
                                <th>Trade union</th>
                                <th>Accuser</th>
                                <th>Summoning Date</th> 
                                <th>Appearance date</th> 
                                <th>Note</th> 
                            </tr>
                            </thead>
                            <?php foreach($model->disputeNotes as $note){ ?>
                            <tr>
                                <td><?= $note->case->employer->companyName;?></td>
                                <td><?= $note->case->employee->firstName;?></td>
                                <td><?= $note->case->employee->lastName;?></td>
                                <td><?= $note->case->tradeUnion->tradeUnionName;?></td>
                                <td><?= $note->case->accuser->accuser;?></td>
                                <td><?= $note->summoningDate;?></td>
                                <td><?= $note->nextSummoningDate;?></td>
                                <td><?= $note->note;?></td>
                                <td>
                                    <?php $pk=$note['id']; ?>
                                    <?= Html::a('Update', ['disputenote/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['disputenote/delete', 'id' => $pk], [
                                        'class' => 'glyphicon glyphicon-trash',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

