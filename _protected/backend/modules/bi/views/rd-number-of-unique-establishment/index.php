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
/* @var $searchModel backend\modules\bi\models\RdNumberOfUniqueEstablishmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Number unique establishments');
$this->params['breadcrumbs'][] = ['label' => 'Business intelligence', 'url' => ['/bi/bi/index']];
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

$models = $dataProvider->getModels();

?>
<div class="rd-number-of-unique-establishment-index">
    <h4>
        <?php
        IF (ISSET($_POST['indicator'])) {
            echo '<div class="alert alert-info" style="text-align: center"><a href="#"><span class="glyphicon glyphicon-stats"></span></a> ' . $_POST['indicator'] . '</div>';
        } ELSE
            $this->render('index');
        ?>
    </h4>
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
            <div class="panel panel-info">
                <div class="panel-heading">Distribution of establishment</div>
            <div class="panel-body">
                <?php Yii::$app->RwandaMap->drawmap(); ?>
            <script type="text/javascript">
                var reg = '<?php echo json_encode($establishment, JSON_NUMERIC_CHECK); ?>';
                var regions = JSON.parse(reg);
            </script>
            </div></div>
        </section>
        <section class="col-lg-6 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="panel panel-info">
                <div class="panel-heading">Establishment growth</div>
            <div class="panel-body">
            <?php
            // $gender=count(array_unique(array_column($js,'fk_gender')));
            echo Highcharts::widget([
                'options' => [
                    'title' => '',
                    'xAxis' => [
                        'categories' => new SeriesDataHelper($dataProvider, ['registrationYear']),
                    ],
                    'yAxis' => [
                        'title' => ['text' => 'Number of job seekers']
                    ],
                    'series' => [
                        [
                            'type' => 'bar',
                            'name' => 'Number of unique establishment',
                            'data' => new SeriesDataHelper($dataProvider, ['numberOfEmployer']),
                        ],
                    ]
                ]
            ]);
            ?>
            </div></div>
            <!-- /.nav-tabs-custom -->
        </section>
    </div>
    <div class="row">
        <!-- Left col -->   
        <section class="col-lg-4 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="panel panel-info">
                <div class="panel-heading">Number of opened and closed establishment</div>
            <div class="panel-body">
            <?php
            echo Highcharts::widget([
                'options' => [
                    'title' => '',
                    'xAxis' => [
                        'categories' => ['Opened', 'Closed']
                    ],
                    'yAxis' => [
                        'title' => ['text' => 'Number of opened and closed establishment']
                    ],
                    'series' => [
                        [
                            'type' => 'pie',
                            'name' => 'Number of establishment',
                            'data' => [
                                [
                                    'name' => 'Opened',
                                    'y' => $models[0]['numberOfEmployer'],
                                ],
                                [
                                    'name' => 'Closed',
                                    'y' => $models[0]['numberOfEmployer'],
                                ],
                            ],
                        ],
                    ],
                ]
            ]);
            ?>
            <!-- /.nav-tabs-custom -->
            </div></div>
        </section>
        <section class="col-lg-4 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="panel panel-info">
                <div class="panel-heading">Number establishment by registration authority</div>
            <div class="panel-body">
            <?php

            echo Highcharts::widget([
                'options' => [
                    'title' => '',
                    'xAxis' => [
                        'categories' => ['Opened', 'Closed']
                    ],
                    'yAxis' => [
                        'title' => ['text' => 'Number establishment by registration authority']
                    ],
                    'series' => [
                        [
                            'type' => 'pie',
                            'name' => 'Number of establishment',
                            'data' => [
                                [
                                    'name' => 'RDB',
                                    'y' => $models[0]['numberOfEmployer'],
                                ],
                                [
                                    'name' => 'District',
                                    'y' => $models[0]['numberOfEmployer'],
                                ],
                            ],
                        ],
                    ],
                ]
            ]);
            ?>
            <!-- /.nav-tabs-custom -->
            </div></div>
        </section>
        <section class="col-lg-4 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="panel panel-info">
                <div class="panel-heading">Number of employees registered</div>
            <div class="panel-body">
            <?php
            echo Highcharts::widget([
                'options' => [
                    'title' => '',
                    'xAxis' => [
                        'categories' => ['Female', 'Male']
                    ],
                    'yAxis' => [
                        'title' => ['text' => 'Number of employees registered']
                    ],
                    'series' => [
                        [
                            'type' => 'pie',
                            'name' => 'Number of employee',
                            'data' => [
                                [
                                    'name' => 'Female',
                                    'y' => $models[0]['numberOfFemaleEmployee'],
                                ],
                                [
                                    'name' => 'Male',
                                    'y' => $models[0]['numberOfMaleEmployee'],
                                ],
                            ],
                        ],
                    ],
                ]
            ]);
            ?>
            </div></div>
            <!-- /.nav-tabs-custom -->
        </section>
    </div>
    <div id="ajaxCrudDatatable">
        <?=
        GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                ['content' =>
        //                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
        //                    ['role'=>'modal-remote','title'=> 'Create new Rd Number Of Unique Establishments','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                    '{toggleData}' .
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
        //                'heading' => '<i class="glyphicon glyphicon-list"></i> Rd Number Of Unique Establishments listing',
                'before' => '<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
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
        ])
        ?>
    </div>
</div>
<?php
Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
])
?>
<?php Modal::end(); ?>

<?php
    $this->registerJsFile(
        '@appRoot/_protected/backend/modules/bi/views/rd-number-of-unique-establishment/establishment.js',
        [
            'depends' => [yii\web\JqueryAsset::className()]
        ]
    );
?>
