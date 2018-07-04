<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\RelEducation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Social collective bargaining agreement', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rel-education-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3" style="text-align: center">
                <span class="glyphicon glyphicon-th-list" style="font-size: 10em; color: #337AB7"></span>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-success">
                    <div class="panel-heading"><strong>Collective bargaining agreement</strong></div>
                    <div class='panel-body'>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Establishment: </th>
                                    <td><?= $model->company->companyName;?></td>
                                </tr>
                                <tr>
                                    <th>Collective bargaining agreement: </th>
                                    <td><?= $model->collectiveBargainingAgreement;?></td>
                                </tr>
                                <tr>
                                    <th>Status: </th>
                                    <td><?= $model->bargainingagreementstatus->status;?></td>
                                </tr>
                                <tr>
                                    <th>Starting date: </th>
                                    <td><?= $model->startDate; ?></td>
                                </tr>
                                <tr>
                                    <th>Ending date: </th>
                                    <td><?= $model->endDate;?></td>
                                </tr> 
                                 <tr>
                                    <th>Actions: </th>
                                    <td>
                                    <?php $pk=$model['id']; ?>
                                    <?= Html::a('Update', ['socialcelloctivebargainingagreement/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['socialcelloctivebargainingagreement/delete', 'id' => $pk], [
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
                    <div class="panel-heading"><strong>Trade union participated in agreements</strong></div>
                    <div class='panel-body'>
                        <p>
                            <?= Html::a(
                                '<i class="glyphicon glyphicon-plus"></i>',
                                ['socialparticipatingtradeunion/create'],
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
                                <th>Collective bargaining agreement</th>  
                                <th>Trade union</th>
                            </tr>
                            </thead>

                            

                            <?php foreach($model->socialParticipatingtradeunions as $participator){ ?>
                                <!-- <?php var_dump($model);?> -->
                            <tr>
                                <td><?= $model->company->companyName;?></td>
                                <td><?= $participator->collectiveBargainingAgreement->collectiveBargainingAgreement;?></td>
                                <td><?= $participator->tradeunion->tradeUnionName;?></td>                             
                                <td>
                                    <?php $pk=$participator['id']; ?>
                                    <?= Html::a('Update', ['socialcollectivebargainingamendment/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['socialcollectivebargainingamendment/delete', 'id' => $pk], [
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
                    <div class="panel-heading"><strong>Collective bargaining amendments</strong></div>
                    <div class='panel-body'>
                        <p>
                            <?= Html::a(
                                '<i class="glyphicon glyphicon-plus"></i>',
                                ['socialcollectivebargainingamendment/create'],
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
                                <th>Agreement</th>  
                                <th>Amendment</th>                               
                                <th>Starting date</th>
                                <th>Ending date</th>
                                <th>Observation</th>
                            </tr>
                            </thead>

                            

                            <?php foreach($model->socialCollectivebargainingamendments as $amendment){ ?>
                                <!-- <?php var_dump($model);?> -->
                            <tr>
                                <td><?= $model->company->companyName;?></td>
                                <td><?= $amendment->collectiveBargainingAgreement->collectiveBargainingAgreement;?></td>
                                <td><?= $amendment->collectiveBargainingAmendment;?></td>
                                <td><?= $amendment->startDate;?></td>
                                <td><?= $amendment->endDate;?></td>
                                <td><?= $amendment->Observation;?></td>
                                <td>
                                    <?php $pk=$amendment['id']; ?>
                                    <?= Html::a('Update', ['socialcollectivebargainingamendment/update', 'id' => $pk], ['class' => 'glyphicon glyphicon-pencil']) ?>
                                    <?= Html::a('Delete', ['socialcollectivebargainingamendment/delete', 'id' => $pk], [
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




