<div class="container"><br>

    <div class="row profile">

        <div class="col-md-3">
            <?php include('page/left_sidebar.php') ?>
        </div>
        <div class="col-md-9">
            <h4>User Balance History</h4>
            <hr/>
            <div class="panel panel-primary">
                <div class="panel-heading">Accept Req</div>
                <div class="panel-body text-justify">
                    <div class="col-md-6 center-block">
                        <form action="<?= base_url('user/proceedBalanceReq') ?>" method="post">
                            <label>Pin </label>
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="-- generate pin --"
                                       readonly="readonly" name="pin_number" id="pin_number" required="required">
                                <input type="hidden" name="user_balance_req_id" value="<?php echo $balance_req_id; ?>">
                                <span class="input-group-btn">
                                <input type="button" onclick="generatePin()" class="btn btn-info pull-left"
                                       value="Generate Pin ">
                            </span>
                            </div>
                            <br/>
                            <div class="form-group">
                                <input type="submit" id="btnAccept" class="btn btn-primary center-block "
                                       value="Accept">
                            </div>
                        </form>
                    </div>
                    <script>

                        function generatePin() {
                            var field = document.getElementById("pin_number");
                            var pin = Math.floor(100000 + Math.random() * 900000);
                            field.value = pin;
                        }

                    </script>
                </div>
            </div>
        </div>
    </div>
</div>