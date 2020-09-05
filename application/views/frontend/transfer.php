<div class="container"><br>

    <div class="row profile">

        <div class="col-md-3">
            <?php include('page/left_sidebar.php') ?>
        </div>
        <div class="col-md-9">
            <h4>Transfer</h4>
            <hr/>
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    ......
                </div>
                <div class="panel-body">
                    <button class="btn btn-primary fa fa-send" data-toggle="modal" data-target="#transfer"> Transfer</button>
                    <br/>
                    <br/>
                    <ul class="nav nav-justified">
<!--                        <li class="active"><a data-toggle="tab" href="#balance">Balance</a></li>-->
<!--                        <li><a data-toggle="tab" href="#point">Point</a></li>-->
                    </ul>
                    <hr/>
                    <div class="tab-content">
                        <div id="balance" class="tab-pane fade in active">
                            <div class="col-md-12">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#balanceFrom">From</a></li>
                                    <li><a data-toggle="tab" href="#balanceTo">To</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="balanceFrom" class="tab-pane fade in active">
                                        <table class="table table-responsive">
                                            <thead>
                                            <th>From Member</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($transfer as $trs) {

                                                if ($trs->trans_type_key == Money && $trs->receiver_id == $this->session->userdata('user_id')) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $trs->fromId ?></td>
                                                        <td><?php echo $trs->fromName ?></td>
                                                        <td><?php echo $trs->transfered_amount ?></td>
                                                        <td><?php echo $trs->transfer_dt ?></td>
                                                    </tr>
                                                <?php }
                                            } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div id="balanceTo" class="tab-pane fade in ">
                                        <table class="table table-responsive">
                                            <thead>
                                            <th>To Member</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($transfer as $trs) {
                                                if ($trs->trans_type_key == Money && $trs->user_id == $this->session->userdata('user_id')) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $trs->toRef ?></td>
                                                        <td><?php echo $trs->toName ?></td>
                                                        <td><?php echo $trs->transfered_amount ?></td>
                                                        <td><?php echo $trs->transfer_dt ?></td>
                                                    </tr>
                                                <?php }
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--                        <div id="point" class="tab-pane fade  ">-->
<!--                            <div class="row">-->
<!--                                <div class="col-md-12">-->
<!--                                    <ul class="nav nav-tabs">-->
<!--                                        <li class="active"><a data-toggle="tab" href="#pointFrom">From</a></li>-->
<!--                                        <li><a data-toggle="tab" href="#pointTo">To</a></li>-->
<!--                                    </ul>-->
<!--                                    <div class="tab-content">-->
<!--                                        <div id="pointFrom" class="tab-pane fade in active">-->
<!--                                            <table class="table table-responsive">-->
<!--                                                <thead>-->
<!--                                                <th>From Member</th>-->
<!--                                                <th>Name</th>-->
<!--                                                <th>Amount</th>-->
<!--                                                <th>Date</th>-->
<!--                                                </thead>-->
<!--                                                <tbody>-->
<!--                                                --><?php
//                                                foreach ($transfer as $trs) {
//                                                    if ($trs->trans_type_key == Point && $trs->receiver_id == $this->session->userdata('user_id')) {
//                                                        ?>
<!--                                                        <tr>-->
<!--                                                            <td>--><?php //echo $trs->fromId ?><!--</td>-->
<!--                                                            <td>--><?php //echo $trs->fromName ?><!--</td>-->
<!--                                                            <td>--><?php //numFormat($trs->transfered_amount) ?><!--</td>-->
<!--                                                            <td>--><?php //echo $trs->transfer_dt ?><!--</td>-->
<!--                                                        </tr>-->
<!--                                                    --><?php //}
//                                                } ?>
<!--                                                </tbody>-->
<!--                                            </table>-->
<!--                                        </div>-->
<!--                                        <div id="pointTo" class="tab-pane fade in ">-->
<!--                                            <table class="table table-responsive">-->
<!--                                                <thead>-->
<!--                                                <th>To Member</th>-->
<!--                                                <th>Name</th>-->
<!--                                                <th>Amount</th>-->
<!--                                                <th>Date</th>-->
<!--                                                </thead>-->
<!--                                                <tbody>-->
<!--                                                --><?php
//                                                foreach ($transfer as $trs) {
//
//                                                    if ($trs->trans_type_key == Point && $trs->user_id == $this->session->userdata('user_id')) {
//                                                        ?>
<!--                                                        <tr>-->
<!--                                                            <td>--><?php //echo $trs->toRef ?><!--</td>-->
<!--                                                            <td>--><?php //echo $trs->toName ?><!--</td>-->
<!--                                                            <td>--><?php //numFormat($trs->transfered_amount) ?><!--</td>-->
<!--                                                            <td>--><?php //echo $trs->transfer_dt ?><!--</td>-->
<!--                                                        </tr>-->
<!--                                                    --><?php //}
//                                                } ?>
<!--                                                </tbody>-->
<!--                                            </table>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade " style="vertical-align: middle" id="transfer" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="panel panel-primary">
            <div class="panel-heading">Transfer</div>
            <div class="panel-body text-justify">
                <form action="<?= base_url('user/transferBalOrPoint') ?>" method="post">

                    <div class="form-group">
                        <select class="form-control hidden" onchange="choose(this.value)" required="required"
                                name="transfer_type"
                                id="req_to">
<!--                            <option value="">-- Select type --</option>-->
<!--                            <option value="1">Point</option>-->
                            <option value="2">Balance</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" onchange="choose(this.value)" required="required"
                                name="receiver_id"
                                id="req_to">
                            <?php getMembersByParentUser($this->session->userdata('ref_id')) ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Transfer Amount </label>
                        <input type="number" class="form-control" name="transfer_amount" required="required">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<br/>