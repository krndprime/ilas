<?php

use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */

$this->title ='';
$this->params['breadcrumbs'][] = ['label' => 'Business intelligence', 'url' => ['/bi/bi/index']];
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-index">
    <div class="body-content">
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
        <hr>
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
        <div class="">
            <table class="table table-striped">
                <tr>
                    <th>Province</th>
                    <th>District</th>
                    <th>Sector</th>
                    <th>Cell</th>
                    <th>Village</th>
                    <th>Female</th>
                    <th>Male</th>
                    <th>All</th>
                </tr>
                <tr>
                    <td>Kigali city</td>
                    <td>Nyarugenge</td>
                    <td>Gitega</td>
                    <td>Kinyange</td>
                    <td>Isano</td>
                    <td>100</td>
                    <td>234</td>
                    <td>334</td>
                </tr>
                <tr>
                    <td>Kigali city</td>
                    <td>Nyarugenge</td>
                    <td>Gitega</td>
                    <td>Kinyange</td>
                    <td>Isano</td>
                    <td>100</td>
                    <td>234</td>
                    <td>334</td>
                </tr>
                <tr>
                    <td>Kigali city</td>
                    <td>Nyarugenge</td>
                    <td>Gitega</td>
                    <td>Kinyange</td>
                    <td>Isano</td>
                    <td>100</td>
                    <td>234</td>
                    <td>334</td>
                </tr>
                <tr>
                    <td>Kigali city</td>
                    <td>Nyarugenge</td>
                    <td>Gitega</td>
                    <td>Kinyange</td>
                    <td>Isano</td>
                    <td>100</td>
                    <td>234</td>
                    <td>334</td>
                </tr>
            </table>
        </div>
    </div>
</div>