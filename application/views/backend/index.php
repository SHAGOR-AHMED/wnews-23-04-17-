<!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/vendor/icon-sets.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/main.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/backend/img/apple-icon.png">
    <link rel="icon" type="<?php echo base_url() ?>assets/backend/image/png" sizes="96x96"
          href="<?php echo base_url() ?>assets/backend/assets/img/favicon.png">
    <script src="<?php echo base_url() ?>assets/backend/js/jquery/jquery-2.1.0.min.js"></script>

</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="brand">
            <a href="<?php echo base_url() ?>">
                <img src="<?php //echo base_url() ?>assets/backend/img/logo.png" alt="MLM"
                     class="img-responsive logo">
            </a>
        </div>
        <div class="sidebar-scroll">
            <?php if (isset($menu)) echo $menu; else echo "Menu Missing"; ?>
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-menu">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="fa fa-bars icon-nav"></i>
                    </button>
                </div>
                <div id="navbar-menu" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <!--                        <li class="dropdown"><a href="#"> <span>Read NewsPaper</span> </a></li>-->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <?php $msg = $this->session->flashdata('msg');
            if (isset($msg)) {
                echo '<div class="alert alert-danger">' . $msg . "</div>";
                unset($msg);
            } ?>
            <?php if (isset($main_content)) echo $main_content; else echo "No Content Found "; ?>
        </div>
        <!-- END MAIN CONTENT -->
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; 2017</a></p>
            </div>
        </footer>
    </div>
    <!-- END MAIN -->
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="<?php echo base_url() ?>assets/backend/js/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/plugins/jquery-easypiechart/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/plugins/chartist/chartist.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/klorofil.min.js"></script>
</body>

</html>
