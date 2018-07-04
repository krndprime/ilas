<?php

use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */

$this->title = '';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><?= 7; ?></h3>

                      <p>Number of open child labour cases</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?= 9; ?></h3>

                      <p>Number of social dialogue cases</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3><?= 3; ?></h3>

                      <p>Number of injuries</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?= 4; ?></h3>

                      <p>Number of open disputes</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <?php
                echo Highcharts::widget([
                   'options' => [
                      'title' => ['text' => 'Number of employees registered in the system'],
                      'xAxis' => [
                         'categories' => ['Female', 'Male']
                      ],
                      'yAxis' => [
                         'title' => ['text' => 'Number of employees registered']
                      ],
                      'series' => [
                         [
                            'type' => 'pie',
                            'name' => 'Gender',
                            'data' => [
                                [
                                  'name' => 'Female',
                                  'y' => 30,
                                ],
                                [
                                  'name' => 'Male',
                                  'y' => 59,
                                ],
                            ],
                            'size' => 300,
                            'dataLabels' => [
                                'enabled' => true,
                            ],
                          ],
                      ]
                   ]
                ]);
              ?>
              <!-- /.nav-tabs-custom -->
            </section>
            <section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <?php
              // $gender=count(array_unique(array_column($js,'fk_gender')));
              echo 8;

              echo Highcharts::widget([
                 'options' => [
                    'title' => ['text' => 'Number of child labour case'],
                    'xAxis' => [
                       'categories' => ['Kigali city', 'Eastern', 'Western', 'Nothern', 'Southern']
                    ],
                    'yAxis' => [
                       'title' => ['text' => 'Number of job seekers']
                    ],
                    'series' => [
                       [
                          'type' => 'column',
                          'name' => 'Provinces',
                          'data' => [56, 11, 4, 7, 9]
                        ],
                    ]
                 ]
              ]);
              ?>
              <!-- /.nav-tabs-custom -->
            </section>
        </div>
    </div>
</div>