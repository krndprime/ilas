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
        <div class="m-b-lg col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
        <div class="m-b-lg col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <a href="#" onclick="select_attr('bra');" data-toggle="popover" data-placement="top" data-content="General profile by region, state, mesoregion, micro-region or city. Check its international trade, economic activity, employment and education data. Examples: Southeast, Mato Grosso, Recife, Metropolitan Region of Porto Alegre." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#ee">
                    <p>Employers and Employees</p>
                    <?= Html::img("../../images/employer.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
        <div class="m-b-lg col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <a href="#" onclick="select_attr('cbo');" data-toggle="popover" data-placement="top" data-content="Regions with best employment rates by professional activity, related courses, average wage and job statistics per year. Examples: Medium level technicians, Industry workers, Receptionists, Clinicians." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#cl">
                    <p>Child labour</p>
                    <?= Html::img("../../images/childlabour.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
        <div class="m-b-lg col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <a href="#" onclick="select_attr('cnae');" data-toggle="popover" data-placement="top" data-content="Information on employment rate by region, average wage by occupation, average monthly income and economic opportunities. Examples: Businesses, Domestic Service, Education, Restaurants, Call Center, Religious Organizations." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#osh">
                    <p>OSH</p>
                    <?= Html::img("../../images/osh.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
        <div class="m-b-lg col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <a href="#" onclick="select_attr('hs');" data-toggle="popover" data-placement="top" data-content="Trade Balance data by product, import origin and export destination, ranking by location, economic activities and related occupations. Examples: Food, Art and Antiques, Iron Ore, Coffee, Auto Parts." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#sd">
                    <p>Social dialogue</p>
                    <?= Html::img("../../images/socialdialogue.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
    </div><br>
    <div class="row">
        <div class="m-b-lg col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <a href="#" onclick="select_attr('bra');" data-toggle="popover" data-placement="top" data-content="General profile by region, state, mesoregion, micro-region or city. Check its international trade, economic activity, employment and education data. Examples: Southeast, Mato Grosso, Recife, Metropolitan Region of Porto Alegre." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#ld">
                    <p>Labour dispute</p>
                    <?= Html::img("../../images/labourdispute.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
        <div class="m-b-lg col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <a href="#" onclick="select_attr('cbo');" data-toggle="popover" data-placement="top" data-content="Regions with best employment rates by professional activity, related courses, average wage and job statistics per year. Examples: Medium level technicians, Industry workers, Receptionists, Clinicians." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#insp">
                    <p>Inspection</p>
                    <?= Html::img("../../images/inspection.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
        <div class="m-b-lg col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <a href="#" onclick="select_attr('cnae');" data-toggle="popover" data-placement="top" data-content="Information on employment rate by region, average wage by occupation, average monthly income and economic opportunities. Examples: Businesses, Domestic Service, Education, Restaurants, Call Center, Religious Organizations." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#aud">
                    <p>Audit</p>
                    <?= Html::img("../../images/audit.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
        <div class="m-b-lg col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <a href="#" onclick="select_attr('hs');" data-toggle="popover" data-placement="top" data-content="Trade Balance data by product, import origin and export destination, ranking by location, economic activities and related occupations. Examples: Food, Art and Antiques, Iron Ore, Coffee, Auto Parts." data-original-title="" title="">
                <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#at">
                    <p>Advanced tool</p>
                    <?= Html::img("../../images/advancedtools.png",['width' => '150','height' => '150']);?>
                </button>
            </a>
        </div>
    </div>
</div>

<!-- Employer and Employees -->
<div class="modal fade" id="ee" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Employers and Employees</h4>
        </div>
        <div class="modal-body">
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'cl1')" id="defaultOpen">Number of employers per year</button>
              <button class="tablinks" onclick="openCity(event, 'cl2')">Number of employees per year</button>
              <button class="tablinks" onclick="openCity(event, 'cl3')">Number of employers per economic activity</button>
            </div>

            <div id="cl1" class="tabcontent" width="60%" heigh="50%">
                <section class="col-lg-6 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <?php
                    // $gender=count(array_unique(array_column($js,'fk_gender')));
                    echo Highcharts::widget([
                       'options' => [
                          'title' => ['text' => ''],
                          'xAxis' => [
                             'categories' => ['2015', '016', '2017']
                          ],
                          'yAxis' => [
                             'title' => ['text' => 'Number of employers per year']
                          ],
                          'series' => [
                             [
                                'type' => 'line',
                                'name' => 'Year',
                                'data' => [22, 30, 44]
                              ],
                          ]
                       ]
                    ]);
                    ?>
                    <!-- /.nav-tabs-custom -->
                </section>
            </div>

            <div id="cl2" class="tabcontent">
              <h3>Paris</h3>
              <p>Paris is the capital of France.</p> 
            </div>

            <div id="cl3" class="tabcontent">
              <h3>Tokyo</h3>
              <p>Tokyo is the capital of Japan.</p>
            </div>

            <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
            </script>
     
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>


<!-- Child labour -->
<div class="modal fade" id="cl" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Child labour</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- OSH -->
<div class="modal fade" id="osh" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Occupation Safety and Health</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Social dialogue -->
<div class="modal fade" id="sd" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Occupation Safety and Health</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Labour dispute -->
<div class="modal fade" id="ld" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Labour dispute</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Inspection -->
<div class="modal fade" id="insp" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inspection</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Audit -->
<div class="modal fade" id="aud" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Audit</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Advanced tools -->
<div class="modal fade" id="at" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Advanced tool</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>