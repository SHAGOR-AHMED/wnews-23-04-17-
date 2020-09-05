<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"> User Balance Request </h3>

        </div>
        <div class="panel-body">

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#all">Pending</a></li>
                <li><a data-toggle="tab" href="#my">Accepted</a></li>
            </ul>
            <div class="tab-content">
                <div id="all" class="tab-pane fade in active" style="max-height: 600px;overflow-y: auto">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead class="bg-info">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Request Amount</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($bal_req as $rb) {
                                    if ($rb->request_status == Pending || $rb->request_status ==Lock_by_Pin) {

                                        ?>
                                        <tr>
                                            <td>#</td>
                                            <td> <?php echo $rb->full_name ?></td>
                                            <td> <?php echo $rb->reference_id ?></td>
                                            <td> <?php
                                                //if($rb->trx_key==Credit){
                                                   echo $rb->request_amount//." <i class='text-primary'> ( VAT Included )</i> ";
                                               // }else{
                                            //        echo $rb->request_amount." <i class='text-primary'> ( Commission Included )</i> ";
                                             //   }
                                                ?></td>
                                            <td> <?php echo $rb->trx_type_name ?></td>
                                            <td> <?php
                                                if ($rb->request_status == Lock_by_Pin) {
                                                    echo "<i class='text-success'>Pin Provided</i>";
                                                } else if ($rb->request_status == Pending) {
                                                    echo "<i class='text-info'>Pending</i>";
                                                } ?></td>
                                            <td> <?php echo $rb->request_dt ?></td>
                                            <td>
                                                <?php if ($rb->request_status == Pending) { ?>
                                                    <a href="<?= base_url('control_panel/proceedReq/' . $rb->user_balance_request_id) ?>"
                                                       title="Accept Request"
                                                       class="btn btn-xs btn-primary fa fa-check"> Proceed Req</a>
                                                    <a href="<?= base_url('control_panel/cancelRequest/' . $rb->user_balance_request_id) ?>"
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
                <div id="my" class="tab-pane fade in" style="max-height: 600px;overflow-y: auto">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead class="bg-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($bal_req as $rb) {
                                    if ($rb->request_status == Approved) {
                                        ?>
                                        <tr>
                                            <td>#</td>
                                            <td> <?php echo $rb->full_name ?></td>
                                            <td> <?php echo $rb->reference_id ?></td>
                                            <td> <?php
                                               // if($rb->trx_key==Credit){
                                                    echo $rb->request_amount;//." <i class='text-primary'> ( VAT Included )</i> ";
                                             //   }else{
                                               //     echo $rb->request_amount." <i class='text-primary'> ( Commission Included )</i> ";
                                              //  }
                                              //  ?></td>
                                            <td> <?php echo $rb->trx_type_name ?></td>
                                            <td> <?php echo "<i class='text-info'>Approved</i>"; ?></td>
                                            <td> <?php echo $rb->request_dt ?></td>

                                        </tr>
                                    <?php }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

