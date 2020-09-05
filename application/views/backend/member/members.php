<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Manage Members </h3>

        </div>
        <div class="panel-body">
            <div class="input-group">
                <input type="text" class="form-control" id="search" placeholder="Enter your member ID for search..">
                <span class="input-group-btn">
        <button class="btn btn-primary" id="btnSearch" type="button">Search !</button>
                    <script>
                        $('#btnSearch').click(function () {
                            var searchVal = $('#search').val();
                            if (searchVal != '') {
                                window.location.href = "<?= base_url('control_panel/searchMembersByRefID/')?>" + searchVal;
                            }
                        });
                        $('#search').keypress(function () {
                            if (event.keyCode == 13) {
                                var searchVal = $('#search').val();
                                if (searchVal != '') {
                                    window.location.href = "<?= base_url('control_panel/searchMembersByRefID/')?>" + searchVal;
                                }
                            }
                        });
                    </script>
      </span>
            </div><!-- /input-group -->
            <br/>
            <!-- /.col-lg-6 -->
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#all">All</a></li>
                <li><a data-toggle="tab" href="#my">Own</a></li>
            </ul>
            <div class="tab-content">
                <div id="all" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead class="bg-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Parent</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                    <th>JOIN</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($users==null) {
                                    echo "No member found";
                                } else {
                                    foreach ($users as $item) {

                                        if ($this->session->userdata('user_id') != $item->user_id) {
                                            ?>

                                            <tr>
                                                <td>.</td>
                                                <td>
                                                    <img src="<?= base_url($item->u_image) ?>" width="50"
                                                         height="50"
                                                         class="img-thumbnail"></td>
                                                <td><?php echo $item->full_name ?></td>
                                                <td><?php echo $item->reference_id ?></td>
                                                <td><?php echo $item->parent_user_ref_id ?></td>
                                                <td><?php echo $item->mobile ?></td>
                                                <td><?php echo $item->is_active == 0 ? "<i class='text-danger'>Inactive</i>" : "<i class='text-primary'>Active</i>"; ?></td>
                                                <td><?php echo $item->user_create_date ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary btn-xs dropdown-toggle"
                                                                type="button"
                                                                data-toggle="dropdown">Option
                                                            <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="<?= base_url('control_panel/memberDetails/' . $item->user_id) ?>">
                                                                    Details
                                                                </a></li>
                                                            <li>
                                                                <a href="<?= base_url('control_panel/membersByMemberID/' . $item->reference_id) ?>">
                                                                    View Members
                                                                </a></li>
                                                            <li>
                                                                <a href="<?= base_url('control_panel/reportsByMemberID/' . $item->user_id) ?>">
                                                                    Reports
                                                                </a></li>
                                                        </ul>
                                                    </div>

                                                </td>
                                            </tr>

                                        <?php }
                                    }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-right">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
                <div id="my" class="tab-pane fade in">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead class="bg-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                    <th>JOIN</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($users as $item) {

                                    if ($this->session->userdata('ref_id') == $item->parent_user_ref_id) {
                                        ?>

                                        <tr>

                                            <td>
                                                <img src="<?= base_url($item->u_image) ?>" width="50"
                                                     height="50"
                                                     class="img-thumbnail"></td>
                                            <td><?php echo $item->full_name ?></td>
                                            <td><?php echo $item->reference_id ?></td>
                                            <td><?php echo $item->mobile ?></td>
                                            <td><?php
                                                if ($item->is_accepted == 0) {
                                                    echo "<i class='text-danger'>Pending</i>";
                                                } else {
                                                    echo $item->is_active == 0 ? "<i class='text-danger'>Inactive</i>" : "<i class='text-primary'>Active</i>";
                                                } ?>
                                            </td>
                                            <td><?php echo $item->user_create_date ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-xs dropdown-toggle" type="button"
                                                            data-toggle="dropdown">Option
                                                        <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">

                                                        <?php if ($item->is_accepted == 0) { ?>
                                                            <a href="<?= base_url('control_panel/acceptMemberByParentMember/' . $item->user_id . '/' . $this->session->userdata('user_id')) ?>">
                                                                <i class="fa fa-check"> Accept</i>
                                                            </a>
                                                        <?php } else {
                                                            if ($item->is_active == 0) { ?>
                                                                <li>
                                                                    <a href="<?= base_url('control_panel/activeMemberByReferrer/' . $item->user_id) ?>">
                                                                        Active
                                                                    </a></li>
                                                            <?php } else { ?>
                                                                <li>
                                                                    <a href="<?= base_url('control_panel/inActiveMemberByReferrer/' . $item->user_id) ?>">
                                                                        InActive
                                                                    </a></li>
                                                            <?php }
                                                        } ?>


                                                        <li>
                                                            <a href="<?= base_url('control_panel/memberDetails/' . $item->user_id) ?>">
                                                                Details
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?= base_url('control_panel/membersByMemberID/' . $item->reference_id) ?>">
                                                                View Members
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>

                                    <?php }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-right">
                            <?php //if ($this->pagination->create_links()) echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

