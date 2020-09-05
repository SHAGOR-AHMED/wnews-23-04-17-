<div class="panel panel-primary">
    <div class="panel-heading"> <?php echo $full_name ?></div>
    <div class="panel-body text-justify">
        <h4>Current Balance : <?php echo $current_balance. " tk"; ?></h4>
        <br/>
        <form action="<?= base_url('control_panel/entryBalanceToUser') ?>" method="post">

            <div class="form-group">
                <label> Amount </label>
                <input type="hidden" class="form-control" name="user_id"
                       value="<?php echo $user_id ?>">
                <input type="text" class="form-control" name="amount" required="required">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
</div>