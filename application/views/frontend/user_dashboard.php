<div class="container"><br>

    <div class="row profile">

        <div class="col-md-3">
            <?php include('page/left_sidebar.php') ?>
        </div>
        <div class="col-md-9">
            <h4>Dashboard</h4>
            <hr/>
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    ......
                </div>
                <div class="panel-body">
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            include "application/libraries/libchart/classes/libchart.php";
                            $chart = new PieChart();
                            $dataSet = new XYDataSet();
                            foreach ($user_total_point as $point) {
                                $dataSet->addPoint(new Point("$point->point_type_name", $point->total_point));
                            }
                            $chart->setDataSet($dataSet);
                            $chart->setTitle("Point Withdraw History");
                            $chart->render("assets/frontend/chart/pie_chart.png");
                            ?>


                            <img alt=" chart"
                                 src="<?php echo base_url() ?>assets/frontend/chart/pie_chart.png"
                                 style="border: 1px solid gray; margin-left: 10%"/>
                            <br/>
                            <br/>
                        </div>

                    </div>
                    <div class=" row">
                        <div class="col-md-12">
                            <?php
                            include "application/libraries/libchart/classes/libchart.php";
                            $chart = new VerticalBarChart();
                            $dataSet = new XYDataSet();
                            foreach ($income_by_post as $iPost) {
                                $dataSet->addPoint(new Point($iPost->point_type_name, $iPost->point));
                            }
                            $chart->setDataSet($dataSet);
                            $chart->setTitle("Income By Post");
                            $chart->render("assets/frontend/chart/income_by_post.png");
                            ?>

                            <img alt=" chart"
                                 src="<?php echo base_url() ?>assets/frontend/chart/income_by_post.png"
                                 style="border: 1px solid gray; margin-left: 10%"/>
                            <br/>
                            <br/>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            include "application/libraries/libchart/classes/libchart.php";
                            $chart = new LineChart();
                            $dataSet = new XYDataSet();
                            foreach ($income_by_ref as $iPr) {
                                $dataSet->addPoint(new Point($iPr->point_type_name, $iPr->point));
                            }
                            $chart->setDataSet($dataSet);
                            $chart->setTitle("Income By Reference");
                            $chart->render("assets/frontend/chart/income_by_ref.png");
                            ?>


                            <img alt="chart"
                                 src="<?php echo base_url() ?>assets/frontend/chart/income_by_ref.png"
                                 style="border: 1px solid gray; margin-left: 10%"/>
                            <br/>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<br/>