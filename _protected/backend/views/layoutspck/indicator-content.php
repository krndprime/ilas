<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use yii\helpers\Html;

use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\Highstock;
use miloschuman\highcharts\SeriesDataHelper;

?>
<div class="content-wrapper">

    <section class="content">
        <div class="panel panel-success">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-signal"></span>
                <?= $this->params['indicator']; ?>
            </div>
            <div class="panel-body">
              <p>
                <?=
                  $this->params['definition'];
                  $route=$this->params['route'];
                ?>
              </p>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-search"></span>
                View by
            </div>
            <div class="panel-body">
                <?= Html::a("National", ["$route/national"],["class" => "btn btn-success"]) ?>
                <?= Html::a("Province", ["$route/province"],["class" => "btn btn-success"]) ?>
                <?= Html::a("District", ["$route/district"],["class" => "btn btn-success"]) ?>
                <?= Html::a("Locality", ["$route/index"],["class" => "btn btn-success"]) ?>
            </div>
        </div>
        <?= Alert::widget() ?>
        <div class="primary-grossenrollmentrate-index">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Data</a></li>
                <li><a data-toggle="tab" href="#menu1">Hitorical</a></li>
                <li><a data-toggle="tab" href="#menu2">Forecast</a></li>
                <li><a data-toggle="tab" href="#menu3">Alerts</a></li>
                <li><a data-toggle="tab" href="#menu4">Metadata</a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active"><br>
                    <?= $content ?>
                </div>
                <div id="menu1" class="tab-pane fade tab-responsive"><br>
                    <?= $this->params['graph']; ?>
                </div>
                <div id="menu2" class="tab-pane fade"><br>
                    <?php 
                        $data = [
                            ['date' => '2006-05-14T20:00:00-0400', 'open' => 67.37, 'high' => 68.38, 'low' => 67.12, 'close' => 67.79, 'volume' => 18921051],
                            ['date' => '2006-05-15T20:00:00-0400', 'open' => 68.1, 'high' => 68.25, 'low' => 64.75, 'close' => 64.98, 'volume' => 33470860],
                            ['date' => '2006-05-16T20:00:00-0400', 'open' => 64.7, 'high' => 65.7, 'low' => 64.07, 'close' => 65.26, 'volume' => 26941146],
                            ['date' => '2006-05-17T20:00:00-0400', 'open' => 65.68, 'high' => 66.26, 'low' => 63.12, 'close' => 63.18, 'volume' => 23524811],
                            ['date' => '2006-05-18T20:00:00-0400', 'open' => 63.26, 'high' => 64.88, 'low' => 62.82, 'close' => 64.51, 'volume' => 35221586],
                            ['date' => '2006-05-21T20:00:00-0400', 'open' => 63.87, 'high' => 63.99, 'low' => 62.77, 'close' => 63.38, 'volume' => 25680800],
                            ['date' => '2006-05-22T20:00:00-0400', 'open' => 64.86, 'high' => 65.19, 'low' => 63, 'close' => 63.15, 'volume' => 24814061],
                            ['date' => '2006-05-23T20:00:00-0400', 'open' => 62.99, 'high' => 63.65, 'low' => 61.56, 'close' => 63.34, 'volume' => 32722949],
                            ['date' => '2006-05-24T20:00:00-0400', 'open' => 64.26, 'high' => 64.45, 'low' => 63.29, 'close' => 64.33, 'volume' => 16563319],
                            ['date' => '2006-05-25T20:00:00-0400', 'open' => 64.31, 'high' => 64.56, 'low' => 63.14, 'close' => 63.55, 'volume' => 15464811],
                        ];

                        $provider = new \yii\data\ArrayDataProvider(['allModels' => $data]);

                        echo Highstock::widget([
                            'options' => [
                                'title' => ['text' => 'Basic Example'],
                                'yAxis' => [
                                    ['title' => ['text' => 'OHLC'], 'height' => '60%'],
                                    ['title' => ['text' => 'Volume'], 'top' => '65%', 'height' => '35%', 'offset' => 0],
                                ],
                                'series' => [
                                    [
                                        'type' => 'candlestick',
                                        'name' => 'OHLC',
                                        'data' => new SeriesDataHelper($provider, ['date:datetime', 'open', 'high', 'low', 'close']),
                                    ],
                                    [
                                        'type' => 'column',
                                        'name' => 'Volume',
                                        'data' => new SeriesDataHelper($provider, ['date:datetime', 'volume:int']),
                                        'yAxis' => 1,
                                    ],
                                ]
                            ]
                        ]);
                    ?>
                </div>
                <div id="menu3" class="tab-pane fade"><br>
                <p>Some content here.</p>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <table class="table table-hover">
                        <tr>
                            <th><?= Yii::t('app','Statistics required') ?></th>
                            <td><?= $this->params['statistics_required']?></td>
                        </tr>
                        <tr>
                            <th><?= Yii::t('app','Method of computation') ?></th>
                            <td><?= $this->params['method_of_computation']?></td>
                        </tr>
                        <tr>
                            <th><?= Yii::t('app','Frequency') ?></th>
                            <td><?= $this->params['frequency']?></td>
                        </tr>
                        <tr>
                            <th><?= Yii::t('app','Responsible position') ?></th>
                            <td><?= $this->params['responsible_position']?></td>
                        </tr>
                        <tr>
                            <th><?= Yii::t('app','Other responsible position') ?></th>
                            <td><?= $this->params['other_responsible_position']?></td>
                        </tr>
                        <tr>
                            <th><?= Yii::t('app','Data source') ?></th>
                            <td><?= $this->params['data_source']?></td>
                        </tr>
                        <tr>
                            <th><?= Yii::t('app','Disaggregation') ?></th>
                            <td><?= $this->params['disaggregation']?></td>
                        </tr>
                        <tr>
                            <th><?= Yii::t('app','Uses') ?></th>
                            <td><?= $this->params['uses']?></td>
                        </tr>
                        <tr>
                            <th><?= Yii::t('app','Limitations') ?></th>
                            <td><?= $this->params['limitations']?></td>
                        </tr>
                        <tr>
                            <th><?= Yii::t('app','Number of institutions') ?></th>
                            <td><?= $this->params['numberofinstitutions']?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class='control-sidebar-menu'>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class='control-sidebar-menu'>
                <li>
                    <a href='javascript::;'>
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-waring pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->

        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked/>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked/>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked/>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked/>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right"/>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
