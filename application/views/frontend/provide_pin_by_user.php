<div class="container"><br>

    <div class="row profile">

        <div class="col-md-3">
            <?php include('page/left_sidebar.php') ?>
        </div>
        <div class="col-md-9">
            <hr/>
            <div class="panel panel-primary">
                <div class="panel-heading">Pin Validation</div>
                <div class="panel-body text-justify">
                    <div class="col-md-6 center-block">
                        <form action="<?= base_url('user/getBalanceByPinNumber') ?>" method="post">
                            <label>Pin </label>
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="-- Enter Your Pin Number  --"
                                       name="pin_number" id="pin_number" required="required">
                                <input type="hidden" name="user_balance_req_id" value="<?php echo $balance_req_id; ?>">
                                <span class="input-group-btn">
                            </span>
                            </div>
                            <br/>
                            <div class="form-group">
                                <input type="submit" id="btnAccept" class="btn btn-primary center-block "
                                       value="Get Balance">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>