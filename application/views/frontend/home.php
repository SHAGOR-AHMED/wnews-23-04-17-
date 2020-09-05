<div id="xtra" style="width: 100%">
    <div id="video">
        <video autoplay="autoplay" loop>
            <source src="<?php echo base_url() ?>assets/frontend/video/glob.mp4" type="video/mp4" type="video/mp4">
        </video>
    </div>
</div>

<div class="row">
    <div class="col-md-4 login_style">
        <form class="login-form" action="<?= base_url('home/checkUserLogin'); ?>" method="post">
            <h3 class="login_title">Sign In</h3>
            <h2 style="color: #ffffff;;">
                <?php
                $msg = $this->session->flashdata("msg");
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
            </h2>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">User ID</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                       placeholder="User ID" name="reference_id" value=""/>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                       placeholder="Password" name="password" value=""/>
            </div>
            <div class="form-actions">
                <button type="submit" name="submit" class="btn btn-success uppercase">Login</button>
                <a href="#" class="text-success" data-toggle="modal" data-target="#forget">Forget Password ?</a>
            </div>
        </form>
        <br/>
    </div>
    <div class="col-md-8"></div>
</div>

<div class="modal fade " style="vertical-align: middle" id="forget" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="panel panel-primary">
            <div class="panel-heading">Forget Password</div>
            <div class="panel-body text-justify">
                <br/>
                <form method="post" action="<?php echo base_url("home/checkEmail") ?>">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter your email...">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>