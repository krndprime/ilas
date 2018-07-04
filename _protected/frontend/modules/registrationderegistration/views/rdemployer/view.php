<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\modules\registrationderegistration\models\Rdemployeraddress;

/* @var $this yii\web\View */
/* @var $model frontend\models\RelEducation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Establishment', 'url' => ['index']];


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
                    <div class="panel-heading"><strong>Identification</strong></div>
                    <div class='panel-body'>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>ID card no: </th>
                                    <td><?= $model->tin;?></td>
                                </tr>
                                <tr>
                                    <th>Names: </th>
                                    <td><?= $model->companyName;?></td>
                                </tr>
                                <tr>
                                    <th>Type: </th>
                                    <td><?= $model->employerType->type; ?></td>
                                </tr>
                                <tr>
                                    <th>Opening of birth: </th>
                                    <td><?= $model->openingDate;?></td>
                                </tr>
                                <tr>
                                    <th>Registration authority: </th>
                                    <td><?= $model->registrationAuthority->registrationauthority;?></td>
                                </tr>
                                <tr>
                                    <th>Intitution sector: </th>
                                    <td><?= $model->ownership->ownership;?></td>
                                </tr>
                                <tr>
                                    <th>Actions: </th>
                                    <td>
                                    <?php $pk=$model['id']; ?>
                                    <?= Html::a('Update', ['rdemployer/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['rdemployer/delete', 'id' => $pk], [
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
                    <div class="panel-heading"><strong>Location and address</strong></div>
                    <div class='panel-body'>
                        <p>
                            <?= Html::a(
                                '<i class="glyphicon glyphicon-plus"></i>',
                                ['rdemployeraddress/create'],
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
                                <th>Village</th>
                                <th>Email address</th>
                                <th>Phone number</th>
                                <th>P.O.Box</th>
                                <th>Physical address</th> 
                            </tr>
                            </thead>
                            <?php foreach($modeladdress as $address){ ?>
                            <tr>
                                <td><?= $address->village->village;?></td>
                                <td><?= $address->emailAddress;?></td>
                                <td><?= $address->phoneNumber;?></td>
                                <td><?= $address->pobox;?></td>
                                <td><?= $address->physicalAddress;?></td>
                                <td>
                                    <?php $pk=$address['id']; ?>
                                    <?= Html::a('Update', ['rdemployeraddress/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['rdemployeraddress/delete', 'id' => $pk], [
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
                    <div class="panel-heading"><strong>Economic sector</strong></div>
                    <div class='panel-body'>
                        <p>
                            <?= Html::a(
                                '<i class="glyphicon glyphicon-plus"></i>',
                                ['rdemployerecosector/create'],
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
                                <th>Economic sector</th>
                                <th>Type</th>
                                <th>Starting date</th>
                            </tr>
                            </thead>
                            <?php foreach($ecosector as $sector){ ?>
                            <tr>
                                <td><?= $sector->ecosector->ecosector;?></td>
                                <td><?= $sector->mainecosector->sector;?></td>
                                <td><?= $sector->startDate;?></td>
                                <td>
                                    <?php $pk=$sector['id']; ?>
                                    <?= Html::a('Update', ['rdemployerecosector/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['rdemployerecosector/delete', 'id' => $pk], [
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
                    <div class="panel-heading"><strong>Representatives</strong></div>
                    <div class='panel-body'>
                        <p>
                            <?= Html::a(
                                '<i class="glyphicon glyphicon-plus"></i>',
                                ['rdemployerrepresentative/create'],
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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Starting date</th>
                                <th>Ending date</th>
                            </tr>
                            </thead>
                            <?php foreach($representatives as $represent){ ?>
                            <tr>
                                <td><?= $represent->person->firstName;?></td>
                                <td><?= $represent->person->lastName;?></td>
                                <td><?= $represent->startDate;?></td>
                                <td><?= $represent->endDate;?></td>
                                <td>
                                    <?php $pk=$represent['id']; ?>
                                    <?= Html::a('Update', ['rdemployerrepresentative/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['rdemployerrepresentative/delete', 'id' => $pk], [
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
                    <div class="panel-heading"><strong>Number of employees</strong></div>
                    <div class='panel-body'>
                        <p>
                            <?= Html::a(
                                '<i class="glyphicon glyphicon-plus"></i>',
                                ['rdemployernumberofemployee/create'],
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
                                <th>Number of female employee</th>
                                <th>Number of male employee</th>
                            </tr>
                            </thead>
                            <?php foreach($numberofemployees as $number){ ?>
                            <tr>
                                <td><?= $number->numberOfFemaleEmployee;?></td>
                                <td><?= $number->numberOfMaleemployee;?></td>
                                <td>
                                    <?php $pk=$number['id']; ?>
                                    <?= Html::a('Update', ['rdemployernumberofemployee/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['rdemployernumberofemployee/delete', 'id' => $pk], [
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
                    <div class="panel-heading"><strong>Status</strong></div>
                    <div class='panel-body'>
                        <p>
                            <?= Html::a(
                                '<i class="glyphicon glyphicon-plus"></i>',
                                ['rdemployerstatus/create'],
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
                                <th>Status</th>
                                <th>Effective date</th>
                            </tr>
                            </thead>
                            <?php foreach($status as $stat){ ?>
                            <tr>
                                <td><?= $stat->employerStatus->status;?></td>
                                <td><?= $stat->statusEffectiveDate;?></td>
                                <td>
                                    <?php $pk=$stat['id']; ?>
                                    <?= Html::a('Update', ['rdemployerstatus/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['rdemployerstatus/delete', 'id' => $pk], [
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
