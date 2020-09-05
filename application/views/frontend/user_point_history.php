<div class="container"><br>

    <div class="row profile">

        <div class="col-md-3">
            <?php include('page/left_sidebar.php') ?>
        </div>
        <div class="col-md-9">
            <h4>User Point History</h4>
            <hr/>
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    ......
                </div>
                <div class="panel-body">


                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#in">In</a></li>
                        <li><a data-toggle="tab" href="#out">Out</a></li>
                        <li><a data-toggle="tab" href="#withdraw">Withdraw</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="in" class="tab-pane fade in active" style="max-height: 600px;overflow-y: auto">
                            <div class="col-md-12">

                                <table class="table table-responsive">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>#</th>
                                        <th>Point</th>
                                        <th>Point Type</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($user_in_point_history as $ph) {
                                        ?>
                                        <tr>
                                            <td>#</td>
                                            <td> <?php numFormat($ph->point_value) ?></td>
                                            <td> <?php echo $ph->point_type_name ?></td>
                                            <td> <?php echo $ph->create_dt ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="out" class="tab-pane fade  " style="max-height: 600px; overflow-y: auto">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-responsive">
                                        <thead class="bg-info">
                                        <tr>
                                            <th>#</th>
                                            <th>Point</th>
                                            <th>Point Type</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($user_out_point_history as $ph) {
                                            ?>
                                            <tr>
                                                <td>#</td>

                                                <td> <?php numFormat($ph->point_value) ?></td>
                                                <td> <?php echo $ph->point_type_name ?></td>
                                                <td> <?php echo $ph->create_dt ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="withdraw" class="tab-pane fade  " style="max-height: 600px; overflow-y: auto">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-responsive">
                                        <thead class="bg-info">
                                        <tr>
                                            <th>#</th>
                                            <th>Point</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($user_out_withdraw_point_history as $pt) {
                                            ?>
                                            <tr>
                                                <td>#</td>

                                                <td> <?php numFormat($pt->point_value) ?></td>
                                                <td> <?php echo $pt->create_dt ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--                    <div class="row">-->
                <!--                        <div class="col-md-6 pull-right">-->
                <!--                            --><?php ////echo $this->pagination->create_links(); ?>
                <!--                        </div>-->
                <!--                    </div>-->
            </div>
        </div>
    </div>

</div>
<br/>