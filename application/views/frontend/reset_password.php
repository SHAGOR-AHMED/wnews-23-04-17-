<div class="container"><br>
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="row profile">

        <div class="col-md-9">
            <h4> Reset Password</h4>
            <hr/>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    ...
                </div>
                <div class="panel-body">
                    <br/>
                    <form id="chngPass" class="register-form" action="<?= base_url('home/updatePassword'); ?>"
                          enctype="multipart/form-data"
                          method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix" type="password" id="password"
                                       placeholder="New Password" name="password"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix" type="password"
                                       placeholder="Retype Password" name="re_password"/>
                            </div>
                        </div>

                        <div style="margin-top: 100px" class="col-md-12 well">

                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Update Password">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#chngPass').validate({ // initialize the plugin
            rules: {
                old_password: {
                    required: true,
                    minlength: 8
                },
                password: {
                    required: true,
                    minlength: 8
                },
                re_password: {
                    required: true,
                    equalTo: "#password"
                }
            }
        });
    });

</script>
<br/>