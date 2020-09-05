<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">My Sent Messages </h3>

            <hr/>
        </div>

        <div class="panel-body">
            <div class="input-group">
                <button id="btnSendSms" data-toggle="modal" data-target="#sendMegBody"
                        class="btn btn-sm btn-primary pull-left"> Send a message
                </button>
            </div>
            <br/>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#public">Public</a></li>
                <li><a data-toggle="tab" href="#user">User</a></li>
            </ul>
            <div class="tab-content">
                <div id="public" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead class="bg-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0;
                                foreach ($publicMessage as $item) {
                                    $i++; ?>

                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo substr($item->msg_title, 0, 20) ?></td>
                                        <td><?php echo $item->date ?></td>
                                        <td>
                                            <button class="btn btn-xs btn-primary" data-toggle="modal"
                                                    data-target="#myModal"
                                                    onclick="detailsMessage(<?php echo $item->msg_id ?>)"> View
                                            </button>
                                        </td>
                                    </tr>

                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pull-right">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="user" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead class="bg-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>To</th>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0;
                                foreach ($userMessage  as $item) {
                                    $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo substr($item->msg_title, 0, 20) ?></td>
                                        <td><?php echo $item->full_name ?></td>
                                        <td><?php echo $item->reference_id ?></td>
                                        <td><?php echo $item->date ?></td>
                                        <td>
                                            <button class="btn btn-xs btn-primary" data-toggle="modal"
                                                    data-target="#myModal"
                                                    onclick="detailsMessage(<?php echo $item->msg_id ?>)"> View
                                            </button>
                                        </td>
                                    </tr>

                                <?php } ?>
                                </tbody>
                            </table>
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
                <form action="<?= base_url('control_panel/sendMessage') ?>" method="post">
                    <div class="form-group">
                        <select class="form-control" required="required" onchange="choose(this.value)" name="public"
                                id="public">
                            <option value="5">-- Message Type --</option>
                            <option value="1">Public</option>
                            <option value="0">Member</option>
                        </select>
                    </div>
                    <div class="form-group" style="display: none" id="user_id">
                        <select class="form-control" name="user_id">
                            <?php getMembers() ?>
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
                <script>
                    function choose(val) {
                        var usr_id = document.getElementById('user_id');
                        if (val == 0) {
                            usr_id.style.display = '';
                        } else if (val == 1) {
                            usr_id.style.display = 'none';
                        } else if (val = 5)
                            usr_id.style.display = 'none';
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<script>

    function detailsMessage(msg_id) {
        $('#detailsMsg').html("");
        $.get("<?php echo base_url()?>control_panel/getMessageDetails/" + msg_id, function (data, status) {
            $('#detailsMsg').html(data);
        });
    }


</script>
<br/>