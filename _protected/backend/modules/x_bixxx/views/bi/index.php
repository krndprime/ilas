<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

$employer='../../images/employer.png';
?>

<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 30%;
    height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid #ccc;
    width: 70%;
    border-left: none;
    height: 300px;
}
</style>
    <div class="row text-center">
        <div class="m-b-md col-xs-12 col-sm-12 col-md-12 col-md-12">
            <h2>Explore our database</h2>
            <p>
                Integrated Labour Administration System (ILAS) gathers data from several sources: Employers and Employees defaultrmation,
                Child Labour Cases, Occupation Safety and Health (OSH) Information, Social Dialogue, Labour disputes, 
                Labour Inspection and Audit of employers.
            </p>
            <div class="text-divider">
                <h3>What would you like to know?</h3>
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="m-b-md col-xs-6 col-sm-3 col-md-3 col-md-3">
            <a href="#" onclick="select_attr('bra');" data-toggle="popover" data-placement="top" data-content="General profile by region, state, mesoregion, micro-region or city. Check its international trade, economic activity, employment and education data. Examples: Southeast, Mato Grosso, Recife, Metropolitan Region of Porto Alegre." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#ee">
                    <p>Employers and Employees</p>
                    <?= Html::img("../../../images/employer.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
        <div class="m-b-md col-xs-6 col-sm-3 col-md-3 col-md-3">
            <a href="#" onclick="select_attr('cbo');" data-toggle="popover" data-placement="top" data-content="Regions with best employment rates by professional activity, related courses, average wage and job statistics per year. Examples: Medium level technicians, Industry workers, Receptionists, Clinicians." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#cl">
                    <p>Child labour</p>
                    <?= Html::img("../../../images/childlabour.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
        <div class="m-b-md col-xs-6 col-sm-3 col-md-3 col-md-3">
            <a href="#" onclick="select_attr('cnae');" data-toggle="popover" data-placement="top" data-content="Information on employment rate by region, average wage by occupation, average monthly income and economic opportunities. Examples: Businesses, Domestic Service, Education, Restaurants, Call Center, Religious Organizations." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#osh">
                    <p>OSH</p>
                    <?= Html::img("../../../images/osh.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
        <div class="m-b-md col-xs-6 col-sm-3 col-md-3 col-md-3">
            <a href="#" onclick="select_attr('hs');" data-toggle="popover" data-placement="top" data-content="Trade Balance data by product, import origin and export destination, ranking by location, economic activities and related occupations. Examples: Food, Art and Antiques, Iron Ore, Coffee, Auto Parts." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#sd">
                    <p>Social dialogue</p>
                    <?= Html::img("../../../images/socialdialogue.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
    </div><br>
    <div class="row">
        <div class="m-b-md col-xs-6 col-sm-3 col-md-3 col-md-3">
            <a href="#" onclick="select_attr('bra');" data-toggle="popover" data-placement="top" data-content="General profile by region, state, mesoregion, micro-region or city. Check its international trade, economic activity, employment and education data. Examples: Southeast, Mato Grosso, Recife, Metropolitan Region of Porto Alegre." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#ld">
                    <p>Labour dispute</p>
                    <?= Html::img("../../../images/labourdispute.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
        <div class="m-b-md col-xs-6 col-sm-3 col-md-3 col-md-3">
            <a href="#" onclick="select_attr('cbo');" data-toggle="popover" data-placement="top" data-content="Regions with best employment rates by professional activity, related courses, average wage and job statistics per year. Examples: Medium level technicians, Industry workers, Receptionists, Clinicians." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#insp">
                    <p>Inspection</p>
                    <?= Html::img("../../../images/inspection.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
        <div class="m-b-md col-xs-6 col-sm-3 col-md-3 col-md-3">
            <a href="#" onclick="select_attr('cnae');" data-toggle="popover" data-placement="top" data-content="Information on employment rate by region, average wage by occupation, average monthly income and economic opportunities. Examples: Businesses, Domestic Service, Education, Restaurants, Call Center, Religious Organizations." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#aud">
                    <p>Audit</p>
                    <?= Html::img("../../../images/audit.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
        <div class="m-b-md col-xs-6 col-sm-3 col-md-3 col-md-3">
            <a href="#" onclick="select_attr('hs');" data-toggle="popover" data-placement="top" data-content="Trade Balance data by product, import origin and export destination, ranking by location, economic activities and related occupations. Examples: Food, Art and Antiques, Iron Ore, Coffee, Auto Parts." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#at">
                    <p>Advanced tool</p>
                    <?= Html::img("../../../images/advancedtools.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
    </div>
</div>

<!-- Employer and Employees -->
<div class="modal fade" id="ee" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Establishments</h4>
        </div>
        <div class="modal-body">
            <table class="table table-condensed">
                <tr>
                    <td>
                        <a href="#"><span class="glyphicon glyphicon-stats"></span></a> 
                        Number of all establishments and number of employees
                    </td>
                    <td>
                        <?= Html::
                                a(
                                    'View',
                                    ['/bi/rd-number-of-unique-establishment/index'],
                                    [
                                        'data-method' => 'post', 
                                        'class' => 'btn btn-primary btn-flat',
                                        'data-params' =>[
                                            'id'=>1,
                                            'indicator'=>'Number of unique establishments and number of employees',
                                        ]
                                    ]
                                ) 
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#"><span class="glyphicon glyphicon-stats"></span></a> 
                        Number of establishments and number of employees by economic sector
                    </td>
                    <td>
                        <?= Html::
                                a(
                                    'View',
                                    ['/bi/rd-number-of-establishment-by-ecosector/index'],
                                    [
                                        'data-method' => 'post', 
                                        'class' => 'btn btn-primary btn-flat',
                                        'data-params' =>[
                                            'id'=>1,
                                            'indicator'=>'Number of establishments and number of employees by economic sector',
                                        ]
                                    ]
                                ) 
                        ?>
                    </td>
                </tr>
            </table>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Child labour -->
<div class="modal fade" id="cl" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Child labour</h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Mapping of child labour
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>4,
                                        'indicator'=>'Mapping of child labour',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a> 
                    Number awareness campaigns
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>5,
                                        'indicator'=>'Number awareness campaigns',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a> 
                    Number of child labour cases
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>6,
                                        'indicator'=>'Number of child labour cases',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- OSH -->
<div class="modal fade" id="osh" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Occupation Safety and Health</h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of employees with fatal case (death)
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view?id=7'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>7,
                                        'indicator'=>'Number of employees with fatal case (death)',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of employees with at least 1 day of absence at work due to occupational injury
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view?id=8'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>8,
                                        'indicator'=>'Number of employees with at least 1 day of absence at work due to occupational injury',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of employees with temporary incapacity
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>9,
                                        'indicator'=>'Number of employees with temporary incapacity',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of employees with permanent incapacity
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view?id=10'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>10,
                                        'indicator'=>'Number of employees with permanent incapacity',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of lost working days
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view?id=11'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>11,
                                        'indicator'=>'Number of lost working days',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of employees affiliated to RSSB
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>12,
                                        'indicator'=>'Number of employees affiliated to RSSB',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>    
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of employees with work-related hospitalization
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>13,
                                        'indicator'=>'Number of employees with work-related hospitalization',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Social dialogue -->
<div class="modal fade" id="sd" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Social dialogue and collective bargaining</h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of trade unions in establishment
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>14,
                                        'indicator'=>'Number of trade unions in establishment',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>    
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of employees in each union
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view?id=15'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>15,
                                        'indicator'=>'Number of employees in each union',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Labour dispute -->
<div class="modal fade" id="ld" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Labour dispute</h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of dispute cases received
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>16,
                                        'indicator'=>'Number of dispute cases received',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of dispute cases settled
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view?id=17'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>17,
                                        'indicator'=>'Number of dispute cases settled',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of none-settled cases
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>18,
                                        'indicator'=>'Number of none-settled cases',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of cases transferred to court
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>19,
                                        'indicator'=>'Number of cases transferred to court',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Inspection -->
<div class="modal fade" id="insp" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inspection</h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of establishment inspected
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>20,
                                        'indicator'=>'Number of establishment inspected',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Average level compliance
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>21,
                                        'indicator'=>'Average level compliance',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Audit -->
<div class="modal fade" id="aud" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Audit</h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Number of establishment audited
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>22,
                                        'indicator'=>'Number of establishment audited',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-stats"></span></a>
                    Average level of compliance
                </td>
                <td>
                    <?= Html::
                            a(
                                'View',
                                ['/bi/bi/view'],
                                [
                                    'data-method' => 'post', 
                                    'class' => 'btn btn-primary btn-flat',
                                    'data-params' =>[
                                        'id'=>23,
                                        'indicator'=>'Average level of compliance',
                                    ]
                                ]
                            ) 
                    ?>
                </td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Advanced tools -->
<div class="modal fade" id="at" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Advanced tool</h4>
      </div>
      <div class="modal-body">
          <table class="table table-bordered">
              <tr>
                  <td>
                      <div class="form-group">
                        <label>Datasets</label>
                        <select multiple class="form-control" id="dataset">
                            <option>Child labour</option>
                            <option>OSH</option>
                            <option>Social dialogue</option>
                            <option>Labour dispute</option>
                            <option>Inspection</option>
                            <option>Audit</option>
                        </select>
                      </div>
                  </td>
                  <td>
                      <div class="form-group">
                        <label>Rows</label>
                        <select multiple class="form-control" id="dataset">
                            <option>Child labour action taken</option>
                            <option>Child labour case status</option>
                            <option>Child labour form</option>
                            <option>Child labour type</option>
                            <option>Child labour economic activity</option>
                            <option>Child education</option>
                            <option>Child labour type</option>
                            <option>Child labour economic activity</option>
                            <option>Child education</option>
                        </select>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      <div class="form-group">
                        <label>Values</label>
                        <select multiple class="form-control" id="dataset">
                            <option>Female</option>
                            <option>Male</option>
                            <option>All (Female & Male)</option>
                            <option>Others</option>
                        </select>
                      </div>
                  </td>
                  <td>
                      <div class="form-group">
                        <label>Functions</label>
                        <select multiple class="form-control" id="dataset">
                            <option>Count</option>
                            <option>Sum</option>
                            <option>Average</option>
                        </select>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      <div class="form-group">
                        <label>Vasualization</label>
                        <select multiple class="form-control" id="dataset">
                            <option>Line chart</option>
                            <option>Colum chart</option>
                            <option>Pie chart</option>
                            <option>Map</option>
                            <option>Table</option>
                        </select>
                      </div>
                  </td>
                  <td>
                      &nbsp;
                  </td>
              </tr>
          </table>
      </div>
      <div class="modal-footer">
        <?= Html::
                a(
                    'View',
                    ['/bi/bi/view'],
                    [
                        'data-method' => 'post', 
                        'class' => 'btn btn-primary btn-flat',
                        'data-params' =>[
                            'id'=>24,
                            'indicator'=>'Custom indicator',
                        ]
                    ]
                ) 
        ?>
      </div>
    </div>

  </div>
</div>