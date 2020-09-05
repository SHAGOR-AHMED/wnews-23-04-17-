<div class="container"><br>

    <div class="row profile">

        <div class="col-md-3">
            <?php include('page/left_sidebar.php') ?>
        </div>
        <div class="col-md-9">
            <h4>User Balance History</h4>
            <hr/>
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    ......
                </div>
                <div class="panel-body">
                    <h3>Current Balance =
                        <?php
                        echo isset($current_bal) ? $current_bal : "";
                        ?>
                    </h3>
                    <hr/>

                    &nbsp;
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#reqBal">
                        <i class="fa fa-hourglass-2"> Request For Balance</i>
                    </button>

                    <a class="btn btn-primary pull-right" href="<?= base_url('user/transfer'); ?>">
                        <i class="fa fa-upload"></i>
                        Transfer
                    </a>

                    <br/>
                    <br/>
                    <br/>

                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#in">History</a></li>
                        <li><a data-toggle="tab" href="#req"> My Request</a></li>
                        <li><a data-toggle="tab" href="#fromOthers">Other Request To Me</a></li>
                        <li><a data-toggle="tab" href="#from">Own Members Balance Request </a></li>

                    </ul>
                    <div class="tab-content">
                        <div id="in" class="tab-pane fade in active" style="max-height: 600px;overflow-y: auto">
                            <div class="col-md-12">
                                <table class="table table-responsive">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>#</th>
                                        <th>Amount</th>
                                        <th>Balance Type</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($bal_history as $bh) {

                                        ?>
                                        <tr>
                                            <td>#</td>
                                            <td> <?php echo $bh->amount ?></td>
                                            <td> <?php echo $bh->balance_source_name ?></td>
                                            <td> <?php echo $bh->balance_type_name ?></td>
                                            <td> <?php echo $bh->create_dt ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="req" class="tab-pane fade" style="max-height: 600px;overflow-y: auto">
                            <div class="col-md-12">

                                <table class="table table-responsive">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>#</th>
                                        <th>Request Amount</th>
                                        <th>Type</th>
                                        <th>To</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($bal_req as $rb) {
                                        ?>
                                        <tr>
                                            <td>#</td>
                                            <td> <?php echo $rb->request_amount ?></td>
                                            <td> <?php if ($rb->request_to == Balance_Request_To_Parent) echo "Debit"; else echo $rb->trx_type_name ?></td>
                                            <td> <?php
                                                if ($rb->request_to == Balance_Request_To_Parent)
                                                    echo "Parent";
                                                else if ($rb->request_to == Balance_Request_To_Admin) {
                                                    echo "Admin";
                                                } else if ($rb->request_to == Balance_Request_To_Any_Member) {
                                                    echo $rb->reference_id;
                                                }


                                                ?></td>
                                            <td> <?php
                                                switch ($rb->request_status) {
                                                    case Pending:
                                                        echo "<i class='text-info'>Pending</i>";
                                                        break;
                                                    case Approved:
                                                        echo "<i class='text-primary'>Approved</i>";
                                                        break;
                                                    case Canceled:
                                                        echo "<i class='text-danger'>Canceled</i>";
                                                        break;
                                                    case Lock_by_Pin:
                                                        echo "<i class='text-success'>Pin Required</i>";
                                                        break;
                                                    default:
                                                        echo '';
                                                }
                                                ?></td>
                                            <td> <?php echo $rb->request_dt ?></td>
                                            <td>
                                                <?php if ($rb->request_status == Pending) { ?>
                                                    <a href="<?= base_url('user/cancelRequest/' . $rb->user_balance_request_id) ?>"
                                                       title="Cancel Your Request"
                                                       class="btn btn-xs btn-danger">Cancel Req</a>
                                                <?php } else if ($rb->request_status == Lock_by_Pin) { ?>
                                                <a href="<?= base_url('user/providePinNumber/' . $rb->user_balance_request_id) ?>"
                                                   title="Cancel Your Request"
                                                   class="btn btn-xs btn-primary fa fa-edit"> Enter Pin </a><?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="fromOthers" class="tab-pane fade" style="max-height: 600px;overflow-y: auto">
                            <div class="col-md-12">

                                <table class="table table-responsive">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>#</th>
                                        <th>From</th>
                                        <th>Request Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    foreach ($other_member_bal_req as $mb) {


                                        ?>
                                        <tr>
                                            <td>#</td>
                                            <td> <?php echo $mb->reference_id; ?></td>
                                            <td> <?php echo $mb->request_amount; ?></td>
                                            <td> <?php
                                                switch ($mb->request_status) {
                                                    case Pending:
                                                        echo "<i class='text-info'>Pending</i>";
                                                        break;
                                                    case Approved:
                                                        echo "<i class='text-primary'>Approved</i>";
                                                        break;
                                                    case Canceled:
                                                        echo "<i class='text-danger'>Canceled</i>";
                                                        break;
                                                    case Lock_by_Pin:
                                                        echo "<i class='text-success'>Pin Provided</i>";
                                                        break;
                                                    default:
                                                        echo '';
                                                }
                                                ?></td>
                                            <td> <?php echo $mb->request_dt ?></td>
                                            <td>
                                                <?php if ($mb->request_status == Pending) { ?>
                                                    <a href="<?= base_url('user/proceedReq/' . $mb->user_balance_request_id) . '/' . $mb->parent_req_id ?>"

                                                       title="Proceed Request"
                                                       class="btn btn-xs btn-primary fa fa-check"> Proceed Req</a>
                                                    <a href="<?= base_url('user/cancelRequest/' . $mb->user_balance_request_id) ?>"
                                                       title="Accept Request"
                                                       class="btn btn-xs btn-danger fa fa-ban"> Cancel </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="from" class="tab-pane fade" style="max-height: 600px;overflow-y: auto">
                            <div class="col-md-12">

                                <table class="table table-responsive">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>#</th>
                                        <th>From</th>
                                        <th>Request Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    foreach ($my_member_bal_req as $mb) {

                                        if ($mb->parent_req_id == $this->session->userdata('user_id')) {
                                            ?>
                                            <tr>
                                                <td>#</td>
                                                <td> <?php echo $mb->reference_id; ?></td>
                                                <td> <?php echo $mb->request_amount; ?></td>
                                                <td> <?php
                                                    switch ($mb->request_status) {
                                                        case Pending:
                                                            echo "<i class='text-info'>Pending</i>";
                                                            break;
                                                        case Approved:
                                                            echo "<i class='text-primary'>Approved</i>";
                                                            break;
                                                        case Canceled:
                                                            echo "<i class='text-danger'>Canceled</i>";
                                                            break;
                                                        case Lock_by_Pin:
                                                            echo "<i class='text-success'>Pin Provided</i>";
                                                            break;
                                                        default:
                                                            echo '';
                                                    }
                                                    ?></td>
                                                <td> <?php echo $mb->request_dt ?></td>
                                                <td>
                                                    <?php if ($mb->request_status == Pending) { ?>
                                                        <a href="<?= base_url('user/proceedReq/' . $mb->user_balance_request_id) . '/' . $mb->parent_req_id ?>"

                                                           title="Proceed Request"
                                                           class="btn btn-xs btn-primary fa fa-check"> Proceed Req</a>
                                                        <a href="<?= base_url('user/cancelRequest/' . $mb->user_balance_request_id) ?>"
                                                           title="Accept Request"
                                                           class="btn btn-xs btn-danger fa fa-ban"> Cancel </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
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
<div class="modal fade " style="vertical-align: middle" id="reqBal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="panel panel-primary">
            <div class="panel-heading">Request For Balance</div>
            <div class="panel-body text-justify">
                <form action="<?= base_url('user/balanceReq') ?>" method="post">
                    <div class="form-group">
                        <div class="form-group">
                            <select class="form-control" onchange="choose(this.value)" required="required" name="req_to"
                                    id="req_to">
                                <option value="">-- Request To --</option>
                                <option value="-1">Admin</option>
                                <option value="1">Parent</option>
                                <option value="0">Member</option>
                            </select>
                        </div>
                        <select class="form-control " style="display: none;" name="trx_type_id"
                                id="trx_type_id">
                            <option value="">-- Select Transaction Type --</option>
                            <option value="1">Debit</option>
                            <option value="0">Credit</option>
                        </select>
                        <select class="form-control " style="display: none;" name="user_id"
                                id="user_id">
                            <option value="">-- Select a member --</option>
                            <?php
                            $data = getMembersForBalanceReq();
                            foreach ($data as $dd) {
                                if ($this->session->userdata('user_id') != $dd->user_id) {
                                    echo '<option value="' . $dd->user_id . '" >  ' . $dd->full_name . '</option><br />';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Request Amount </label>
                        <input type="number" class="form-control" name="request_amount" required="required">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
                <script>
                    function choose(val) {
                        var trx_type_id = document.getElementById('trx_type_id');
                        var user_id = document.getElementById('user_id');
                        if (val == -1) {
                            trx_type_id.style.display = '';
                            user_id.style.display = 'none';
                        } else if (val == 1) {
                            trx_type_id.style.display = 'none';
                            user_id.style.display = 'none';
                        }
                        else if (val == 0) {
                            user_id.style.display = '';
                            trx_type_id.style.display = 'none';
                        }
                    }

                </script>
            </div>
        </div>
    </div>
</div>

<br/>