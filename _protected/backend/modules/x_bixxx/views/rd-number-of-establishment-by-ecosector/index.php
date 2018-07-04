<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\bi\models\RdNumberOfEstablishmentByEcosectorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Rd Number Of Establishment By Ecosectors');
$this->params['breadcrumbs'][] = ['label' => 'Business intelligence', 'url' => ['/bi/bi/index']];
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

$models = $dataProvider->getModels();

?>
<div class="rd-number-of-establishment-by-ecosector-index">
    <h4>
        <?php 
            IF(ISSET($_POST['indicator'])) 
            {
                echo '<div class="alert alert-info" style="text-align: center"><a href="#"><span class="glyphicon glyphicon-stats"></span></a> '.$_POST['indicator'].'</div>'; 
            }
            ELSE 
                $this->render('index'); 
        ?>
    </h4>
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="panel panel-info">
                <div class="panel-heading">Establishment by economic sector</div>
            <div class="panel-body">
            <?php
            // $gender=count(array_unique(array_column($js,'fk_gender')));
            echo Highcharts::widget([
                'options' => [
                    'title' => '',
                    'xAxis' => [
                        'categories' => new SeriesDataHelper($dataProvider, ['ecosector','registrationYear']),
                    ],
                    'yAxis' => [
                        'title' => ['text' => 'Number of establishment']
                    ],
                    'series' => [
                        [
                            'type' => 'bar',
                            //'name' => 'Number of establishment',
                            'data' => new SeriesDataHelper($dataProvider, ['numberOfEmployer']),
                        ],
                    ]
                ]
            ]);
            ?>
            </div></div>
            <!-- /.nav-tabs-custom -->
        </section>
        <section class="col-lg-6 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="panel panel-info">
                <div class="panel-heading">Employees by economic sector</div>
            <div class="panel-body">
            <?php
            // $gender=count(array_unique(array_column($js,'fk_gender')));
            echo Highcharts::widget([
                'options' => [
                    'title' => '',
                    'xAxis' => [
                        'categories' => new SeriesDataHelper($dataProvider, ['registrationYear','ecosector']),
                    ],
                    'yAxis' => [
                        'title' => ''
                    ],
                    'series' => [
                        [
                            'type' => 'bar',
                            'name' => 'Female',
                            'data' => new SeriesDataHelper($dataProvider, ['numberOfFemaleEmployee']),
                        ],
                        [
                            'type' => 'bar',
                            'name' => 'Male',
                            'data' => new SeriesDataHelper($dataProvider, ['numberOfMaleEmployee']),
                        ],
                    ]
                ]
            ]);
            ?>
            </div></div>
            <!-- /.nav-tabs-custom -->
        </section>
    </div>
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
//                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
//                    ['role'=>'modal-remote','title'=> 'Create new Rd Number Of Establishment By Ecosectors','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
//                'heading' => '<i class="glyphicon glyphicon-list"></i> Rd Number Of Establishment By Ecosectors listing',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
//                'after'=>BulkButtonWidget::widget([
//                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
//                                ["bulk-delete"] ,
//                                [
//                                    "class"=>"btn btn-danger btn-xs",
//                                    'role'=>'modal-remote-bulk',
//                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
//                                    'data-request-method'=>'post',
//                                    'data-confirm-title'=>'Are you sure?',
//                                    'data-confirm-message'=>'Are you sure want to delete this item'
//                                ]),
//                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

<?php
    $this->registerJsFile(
        '@appRoot/_protected/backend/modules/bi/views/rd-number-of-establishment-by-ecosector/establishment.js',
        [
            'depends' => [yii\web\JqueryAsset::className()]
        ]
    );
?>
