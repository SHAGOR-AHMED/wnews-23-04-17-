<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>

        <?php //if (isset($title)) {
//            echo $title;
//        } ?>

        WorldNews365
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url('assets/frontend/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('assets/frontend/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('assets/frontend/css/login.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('assets/frontend/css/components-rounded.css'); ?>" id="style_components" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url('assets/dt_picker/jquery.datepick.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/css/custom.css'); ?>" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="<?= base_url('assets/frontend/img/globe.gif'); ?>"/>
    <script src="<?= base_url('assets/frontend/js/jquery.min.js'); ?>" type="text/javascript"></script>
</head>
<div class="menu-toggler sidebar-toggler"></div>
<!-- START MENU OR HEADER OPTION -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="<?= base_url('assets/frontend/img/final_logo.png'); ?>" height="80px" width="100px"/>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="header_menu">
                <ul class="nav navbar-nav">
                    <?php if ($this->session->userdata('user_id') == null) { ?>
                        <li><a href="<?php echo base_url() ?>">HOME <span class="sr-only">(current)</span></a></li>
                        <li><a href="<?php echo base_url() ?>home/registration">CREATE ACCOUNT</a></li>
                        <li><a href="">ABOUT US</a></li>
                    <?php }else{?>
                        <li><a href="<?= base_url('news') ?>" target="_blanks">Newspaper </a></li>
                    <?php } ?>
                </ul>
            </div>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- END HEADER -->
<br/><br/><br/>
<style type="text/css">
    #xtra {
        width: 100%;
        position: relative;
        top: -100px;
        left: -70px;
    }

    #video {
        height: 100px;
        width: 100%;
    }
</style>

<body>

<div class="container thumbnail" style="margin-top: 30px;background-color: #cccccc">
    <?php
    $msg = $this->session->flashdata('msg');
    if (isset($msg)) {
        echo '<div class="alert alert-danger">' . $msg . "</div>";
        unset($msg);
    }
    if (isset($content)) echo $content; ?>
</div>
<br/>

<div class="footer navbar-fixed-bottom">
    <footer class="copyright navbar navbar-default navbar-bottom">
        <span>2017 © WORLDNEWS365. ALL RIGHT RESERVE.</span>
    </footer>
</div>


<script src="<?= base_url('assets/frontend/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/frontend/js/jquery.validate.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/dt_picker/jquery.plugin.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/dt_picker/jquery.datepick.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/frontend/js/metronic.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/frontend/js/layout.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/frontend/js/login.js'); ?>" type="text/javascript"></script>

<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Login.init();
    });
</script>

</body>
</html>