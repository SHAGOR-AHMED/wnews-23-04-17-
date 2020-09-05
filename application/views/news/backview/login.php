<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel | Log In</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?= base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?= base_url('css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?= base_url('css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form action="<?= base_url('login/check_login');?>" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="admin_name" class="form-control" placeholder="User ID" id="UserName"/>
                  </div>
                    <div class="form-group">
                        <input type="password" name="admin_password" class="form-control" placeholder="Password" id="UserPass"/>
                  </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" name="btnLogin" class="btn bg-olive btn-block">Sign In</button>  
                    
                </div>
            </form>

            <div class="margin text-center">
                <?php 
                    $msg = $this->session->userdata('message');
                    if($msg){
                        echo $msg;
                        $this->session->unset_userdata('message');
                    }
                ?>
            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('js/bootstrap.min.js');?>" type="text/javascript"></script>        

    </body>
</html>