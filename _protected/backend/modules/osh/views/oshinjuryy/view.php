<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\modules\osh\models\oshPreventivemeasures;

/* @var $this yii\web\View */
/* @var $model frontend\models\RelEducation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'OSH case', 'url' => ['index']];


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
                    <div class="panel-heading"><strong>OSH case</strong></div>
                    <div class='panel-body'>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Employee fistname: </th>
                                    <td><?= $model->employee->firstName;?></td>
                                </tr>
                                <tr>
                                    <th>Employee fistname: </th>
                                    <td><?= $model->employee->lastName;?></td>
                                </tr>
                                <tr>
                                    <th>Injury type: </th>
                                    <td><?= $model->injuryType->type; ?></td>
                                </tr>
                                <tr>
                                    <th>Frequency: </th>
                                    <td><?= $model->frequency->frequency?></td>
                                </tr>
                                <tr>
                                    <th>Desease: </th>
                                    <td><?= $model->desease->desease;?></td>
                                </tr>
                                <tr>
                                    <th>Accident: </th>
                                    <td><?= $model->accident->accident;?></td>
                                </tr>
                                <tr>
                                    <th>Category: </th>
                                    <td><?= $model->injuryCategory->category;?></td>
                                </tr>
                                <tr>
                                    <th>Part of the body: </th>
                                    <td><?= $model->partOfTheBody->partOfTheBody;?></td>
                                </tr>
                                <tr>
                                    <th>Cause: </th>
                                    <td><?= $model->cause->cause;?></td>
                                </tr>
                                <tr>
                                    <th>OSH training related to occupation: </th>
                                    <td><?= $model->oshTrainingRelatedToOccupation->noyes;?></td>
                                </tr>
                                <tr>
                                    <th>Injury date: </th>
                                    <td><?= $model->injuryDate;?></td>
                                </tr>
                                <tr>
                                    <th>Return to work date: </th>
                                    <td><?= $model->returnToWorkDate;?></td>
                                </tr>
                                <tr>
                                    <th>Affiliated to RSSB: </th>
                                    <td><?= $model->affiliatedToRssb->noyes;?></td>
                                </tr>
                                <tr>
                                    <th>RSSB number: </th>
                                    <td><?= $model->rssbNumber;?></td>
                                </tr>
                                <tr>
                                    <th>observation: </th>
                                    <td><?= $model->observation;?></td>
                                </tr>
                                <tr>
                                    <th>Actions: </th>
                                    <td>
                                    <?php $pk=$model['id']; ?>
                                    <?= Html::a('Update', ['oshinjury/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['oshinjury/delete', 'id' => $pk], [
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
                    <div class="panel-heading"><strong>Preventive measures</strong></div>
                    <div class='panel-body'>
                        <p>
                            <?= Html::a(
                                '<i class="glyphicon glyphicon-plus"></i>',
                                ['oshpreventivemeasure/create'],
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
                                <th>Cause</th>                             
                                <th>Preventive measure</th>
                            </tr>
                            </thead>
                            <?php foreach($model->oshPreventivemeasures as $measure){ ?>
                            <tr>
                                <td><?= $model->cause->cause;?></td>
                                <td><?= $measure->preventivemeasure->preventivemeasure;?></td>
                                <td>
                                    <?php $pk=$measure['id']; ?>
                                    <?= Html::a('Update', ['oshpreventivemeasure/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['oshpreventivemeasure/delete', 'id' => $pk], [
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
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading"><strong>Action taken</strong></div>
                    <div class='panel-body'>
                        <p>
                            <?= Html::a(
                                '<i class="glyphicon glyphicon-plus"></i>',
                                ['oshactiontaken/create'],
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
                                <th>Cause</th>                             
                                <th>Action taken</th>
                            </tr>
                            </thead>
                            <?php foreach($model->oshActiontakens as $action){ ?>
                            <tr>
                                <td><?= $model->cause->cause;?></td>
                                <td><?= $action->actiontaken->firstAid;?></td>
                                <td>
                                    <?php $pk=$action['id']; ?>
                                    <?= Html::a('Update', ['oshactiontaken/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['oshactiontaken/delete', 'id' => $pk], [
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
