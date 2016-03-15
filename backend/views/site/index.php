<?php
/* @var $this yii\web\View */

use common\widgets\CounterWidget;

$this->title = 'CMS Yii2';
?>

<!-- top tiles -->


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Thống kê</h3>
                </div>
                <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                <div style="width: 100%;">
                    <canvas id="canvas000"></canvas>
                    <!-- <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:270px;"></div> -->
                </div>
            </div>
            

            <div class="clearfix"></div>
        </div>
    </div>

</div>
<?= $this->registerJs('
    var lineChartData = {
                labels: ["1/08", "2/08", "3/08", "4/08", "5/08", "6/08", "7/08", "8/08", "9/08", "10/08", "11/08"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(38, 185, 154, 0.21)", //rgba(220,220,220,0.2)
                        strokeColor: "rgba(38, 185, 154, 0.7)", //rgba(220,220,220,1)
                        pointColor: "rgba(38, 185, 154, 0.7)", //rgba(220,220,220,1)
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [652, 674, 556, 739, 720, 785, 627, 785, 852, 900, 891]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(3, 88, 106, 0.2)", //rgba(151,187,205,0.2)
                        strokeColor: "rgba(3, 88, 106, 0.70)", //rgba(151,187,205,1)
                        pointColor: "rgba(3, 88, 106, 0.70)", //rgba(151,187,205,1)
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [820, 713, 676, 916, 992, 849, 721, 821, 792, 700, 682]
                    }
                ]

            }

            $(document).ready(function () {
                new Chart(document.getElementById("canvas000").getContext("2d")).Line(lineChartData, {
                    responsive: true,
                    tooltipFillColor: "rgba(51, 51, 51, 0.55)"
                });
            });    
')?>