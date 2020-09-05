<div class="container"><br>

    <div class="row profile">

        <div class="col-md-3">
            <?php include('page/left_sidebar.php') ?>
        </div>
        <div class="col-md-9">
            <h4>Receive Messages </h4>
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    ......
                </div>
                <div class="panel-body">

                    <br/>
                    <button id="btnSendSms" data-toggle="modal" data-target="#sendMegBody"
                            class="btn btn-sm btn-primary pull-left"> Send a message to your members
                    </button>
                    <a href="<?= base_url('user/sentItems') ?>" class="btn btn-sm btn-primary pull-right"> Sent
                        Items </a>
                    <br/>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead class="bg-info">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>From</th>
                                    <th>ID</th>
                                    <th>Role</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0;
                                foreach ($message as $item) {
                                    $i++; ?>

                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $item->msg_title ?></td>
                                        <td><?php echo $item->full_name ?></td>
                                        <td><?php echo $item->reference_id ?></td>
                                        <td><?php echo $item->role == 0 ? "Member" : "Admin"; ?></td>
                                        <td><?php echo $item->date ?></td>
                                        <td>
                                            <button class="btn btn-xs btn-info" data-toggle="modal"
                                                    data-target="#myModal"
                                                    onclick="detailsMessage(<?php echo $item->msg_id ?>)">
                                                View
                                            </button>
                                        </td>
                                    </tr>

                                <?php } ?>
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
            </div>
        </div>

    </div>
</div>
<div class="modal fade " style="vertical-align: middle" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="panel panel-primary">
            <div class="panel-heading"></div>
            <div class="panel-body text-justify" id="detailsMsg">

            </div>
        </div>
    </div>
</div>
<div class="modal fade " style="vertical-align: middle" id="sendMegBody" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="panel panel-primary">
            <div class="panel-heading">Send Your Message</div>
            <div class="panel-body text-justify" id="detailsMsg">
                <form action="<?= base_url('user/sendMessage') ?>" method="post">
                    <div class="form-group">
                        <select class="form-control" required="required" name="user_id" id="user_id">
                            <?php getMembersByParentUser($this->session->userdata('ref_id')) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Message Title</label>
                        <input type="text" class="form-control" name="msg_title" required="required">
                    </div>
                    <div class="form-group">
                        <label>Your Message</label>
                        <textarea cols="10" rows="10" class="form-control" required="required"
                                  name="msg_content"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Send">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function detailsMessage(msg_id) {
        $('#detailsMsg').html("");
        $.get("<?php echo base_url()?>user/getMessageDetails/" + msg_id, function (data, status) {
            $('#detailsMsg').html(data);
        });
    }
</script>
<br/>