<div class="container"><br>

    <div class="row profile">

        <div class="col-md-3">
            <?php include('page/left_sidebar.php') ?>
        </div>
        <div class="col-md-9">
            <h4>Earning Report</h4>
            <hr/>
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    ......
                </div>
                <div class="panel-body">
                    <span style="font-size: 16px">
                        <span class="pull-left">Current Point =
                            <?php
                            if ($user_current_point < 0) {
                                echo "";
                            } else {
                                numFormat(floor($user_current_point));
                            }
                            ?>
                        </span>
                        <span class="pull-right">
                      You can convert point  =
                            <?php
                            if ($user_withdrawal_point < 0) {
                                echo "";
                            } else {
                                numFormat(floor($user_withdrawal_point));
                            }
                            ?>
                        </span>
                    </span>
                    <br/>
                    <hr/>
                    <div class="btn-group pull-right" role="group" aria-label="...">
                        <a href="<?= base_url('user/buyPoint') ?>" data-toggle="modal" data-target="#buyPointModal"
                           class="btn btn-primary pull-right"><i
                                    class="fa fa-shopping-cart"></i> Buy Point</a>
                        <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#withdraw" href="#"><i
                                    class="fa fa-arrow-left"></i> Withdraw</a>
<!--                        <a class="btn btn-primary pull-right" href="--><?//= base_url('user/transfer') ?><!--"><i-->
<!--                                    class="fa fa-arrow-right"></i> Transfer</a>-->
                    </div>

                    <br/>

                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#running">Running Point</a></li>
                        <li><a data-toggle="tab" href="#total">Total Withdraw</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="running" class="tab-pane fade in active">
                            <div class="col-md-6">
                                <table class="table table-responsive table-bordered">
                                    <thead>
                                    <th colspan="2" class="text-center  bg-primary">Income By Post</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $totalIP = 0;
                                    foreach ($income_by_post as $icPost) {
                                        $totalIP += $icPost->point;
                                        ?>
                                        <tr>
                                            <td><?php echo $icPost->point_type_name ?></td>
                                            <td><?php numFormat($icPost->point) ?>  </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td class="text-right"><b>Total</b></td>
                                        <td><?php numFormat($totalIP); ?></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-6">
                                <table class="table table-responsive table-bordered">
                                    <thead>
                                    <th colspan="2" class="text-center bg-primary">Income By Others</th>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $totalIR = 0;
                                    foreach ($income_by_ref as $iconRef) {
                                        $totalIR += $iconRef->point;
                                        ?>
                                        <tr>
                                            <td><?php echo $iconRef->point_type_name ?></td>
                                            <td><?php numFormat($iconRef->point) ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td class="text-right"><b>Total</b></td>
                                        <td><?php numFormat($totalIR); ?></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div id="total" class="tab-pane fade  ">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-responsive table-bordered">
                                        <thead>
                                        <th colspan="2" class="text-center  bg-primary">Total Point From Start</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $to = 0;
                                        foreach ($user_total_point as $tp) {
                                            $to += $tp->total_point;
                                            ?>
                                            <tr>
                                                <td><?php echo $tp->point_type_name ?></td>
                                                <td><?php numFormat($tp->total_point) ?>  </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td class="text-right"><b>Total</b></td>
                                            <td><?php numFormat($to); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<br/>
<div class="modal fade " style="vertical-align: middle" id="buyPointModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="panel panel-primary">
            <div class="panel-heading">Buy Point</div>
            <div class="panel-body text-justify">
                <br/>
                <form action="<?= base_url('user/buyPointByUser') ?>" method="post">
                    <div class="form-group">
                        <label> Point </label>
                        <input type="number" class="form-control" name="point" required="required">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Buy">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " style="vertical-align: middle" id="withdraw" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="panel panel-primary">
            <div class="panel-heading">Convert To Balance</div>
            <div class="panel-body text-justify">
                <br/>
                <div class="form-group">
                    <a href="<?= base_url('user/convertPointToBalance') ?>" class="btn btn-primary">Convert</a>
                </div>
            </div>
        </div>
    </div>
</div>
