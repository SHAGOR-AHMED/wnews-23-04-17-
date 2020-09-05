<div class="container"><br>

    <div class="row profile">

        <div class="col-md-3">
            <?php include('page/left_sidebar.php') ?>
        </div>
        <div class="col-md-9">
            <h4>My Members</h4>
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    ......
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#pending">Pending</a></li>
                        <li><a data-toggle="tab" href="#active">Active</a></li>
                        <li><a data-toggle="tab" href="#inactive">Inactive</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="pending" class="tab-pane fade in active">
                            <div class="col-md-12">
                                <table class="table table-responsive">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>ID</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>JOIN</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0;
                                    foreach ($pendingUsers as $item) {
                                        $i++; ?>

                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $item->full_name ?></td>
                                            <td><?php echo $item->reference_id ?></td>
                                            <td><?php echo $item->mobile ?></td>
                                            <td><?php echo $item->is_accepted == 0 ? "<i class='text-danger'>Pending</i>" : ""; ?></td>
                                            <td><?php echo $item->user_create_date ?></td>
                                            <td>
                                                <a class="btn btn-xs btn-primary"
                                                   href="<?= base_url('user/userDetails/' . $item->user_id) ?>">
                                                    <i class="fa fa-bars"> Details</i>
                                                </a>

                                                <a class="btn btn-xs btn-primary"
                                                   href="<?= base_url('user/acceptMemberByParentMember/' . $item->user_id . '/' . $this->session->userdata('user_id')) ?>">
                                                    <i class="fa fa-check"> Accept</i>
                                                </a>
                                                <a class="btn btn-xs btn-danger"
                                                   href="<?= base_url('user/cancelMemberByReferrer/' . $item->user_id . '/' . $this->session->userdata('user_id')) ?>">
                                                    <i class="fa fa-check"> Cancel</i>
                                                </a>

                                            </td>
                                        </tr>

                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="active" class="tab-pane fade  ">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-responsive">
                                        <thead class="bg-info">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                            <th>JOIN</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0;
                                        foreach ($activeUsers as $item) {
                                            $i++; ?>

                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $item->full_name ?></td>
                                                <td><?php echo $item->reference_id ?></td>
                                                <td><?php echo $item->mobile ?></td>
                                                <td><?php echo $item->is_active == 0 ? "<i class='text-danger'>Inactive</i>" : "<i class='text-primary'>Active</i>"; ?></td>
                                                <td><?php echo $item->user_create_date ?></td>
                                                <td>
                                                    <a class="btn btn-xs btn-primary"
                                                       href="<?= base_url('user/userDetails/' . $item->user_id) ?>">
                                                        Details
                                                    </a>
                                                    <?php if ($item->is_active == 0) { ?>
                                                        <a class="btn btn-xs btn-primary"
                                                           href="<?= base_url('user/activeMemberByReferrer/' . $item->user_id) ?>">
                                                            Active
                                                        </a>
                                                    <?php } else { ?>

                                                        <a class="btn btn-xs btn-primary"
                                                           href="<?= base_url('user/inActiveMemberByReferrer/' . $item->user_id) ?>">
                                                            InActive
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="inactive" class="tab-pane fade  ">
                            <table class="table table-responsive">
                                <thead class="bg-info">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                    <th>JOIN</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0;
                                foreach ($inactiveUsers as $item) {
                                    $i++; ?>

                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $item->full_name ?></td>
                                        <td><?php echo $item->reference_id ?></td>
                                        <td><?php echo $item->mobile ?></td>
                                        <td><?php echo $item->is_active == 0 ? "<i class='text-danger'>Inactive</i>" : "<i class='text-primary'>Active</i>"; ?></td>
                                        <td><?php echo $item->user_create_date ?></td>
                                        <td>
                                            <a class="btn btn-xs btn-primary"
                                               href="<?= base_url('user/userDetails/' . $item->user_id) ?>">
                                                Details
                                            </a>
                                            <?php if ($item->is_active == 0) {
                                                if ($item->is_accepted == 5) { ?>
                                                    <a class="btn btn-xs btn-primary"
                                                       href="<?= base_url('user/acceptMemberByParentMember/' . $item->user_id . '/' . $this->session->userdata('user_id')) ?>">
                                                        <i class="fa fa-check"> Accept</i>
                                                    </a>
                                                <?php } else { ?>
                                                    <a class="btn btn-xs btn-primary"
                                                       href="<?= base_url('user/activeMemberByReferrer/' . $item->user_id) ?>">
                                                        Active
                                                    </a>
                                                <?php }
                                            } ?>
                                        </td>
                                    </tr>

                                <?php } ?>
                                </tbody>
                            </table>
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
</div>
<br/>