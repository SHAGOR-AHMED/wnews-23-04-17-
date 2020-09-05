
<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Proceed User Request</h3>

        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-6 text-center" id="display">

                    <form action="<?= base_url('control_panel/proceedBalanceReq') ?>" method="post">
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


