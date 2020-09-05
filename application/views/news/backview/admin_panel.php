<?php include('page/header.php');?>

<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header"> <a href="#" class="logo">WorldNews365</a> 
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation"> 
    <!-- Sidebar toggle button--> 
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
    <div class="navbar-right">
      <ul class="nav navbar-nav">

        <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-user"></i>
          <span>
            <?php 
              $admin_name=$this->session->userdata('admin_name');
              $admin_id=$this->session->userdata('admin_id');
              if($admin_name){
                echo $admin_name;
              }
            ?>
            <i class="caret"></i>
          </span> </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header bg-light-blue"> <img src="<?= base_url('img/avatar3.png');?>" class="img-circle" alt="User Image" />
              <p> <?php echo $admin_name; ?></p>
            </li>
            <!-- Menu Body --> 
            
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left"> </div>
              <div class="pull-right"> <a href="<?= base_url('login/logout');?>" class="btn btn-default btn-flat">Sign out</a> </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left"> 
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="left-side sidebar-offcanvas"> 
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image"> <img src="<?= base_url('img/avatar3.png');?>" class="img-circle" alt="User Image" /> </div>
        <div class="pull-left info">
          <p>Hello, <?php echo $admin_name;  ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a> </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">Last Login Time: </div>
      </form> -->
      <!-- /.search form --> 
      <!-- sidebar menu: : style can be found in sidebar.less -->
     <!--  <?php //echo base_url('backend/admin_info')."backend/admin_info/".$admin_id; ?> -->
      <ul class="sidebar-menu">
        
        <li class="treeview"> <a href="#"> <i class="fa fa-bar-chart-o"></i> <span>Admin Management</span> <i class="fa fa-angle-left pull-right"></i> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('backend/admin_info'); ?>" target="abc"><i class="fa fa-angle-double-right"></i>Create Admin User</a></li>
				<!--<li><a href="#"><i class="fa fa-angle-double-right"></i>Permission Info</a></li>-->         
 		</ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-laptop"></i> <span>News Management</span> <i class="fa fa-angle-left pull-right"></i> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('backend/top_news_info'); ?>" target="abc"><i class="fa fa-angle-double-right"></i> Create Scroll News</a></li>
            <!--<li><a href="news_category_info.php" target="abc"><i class="fa fa-angle-double-right"></i> Edit News Category</a></li>-->
            <li><a href="<?php echo base_url('backend/news_info'); ?>" target="abc"><i class="fa fa-angle-double-right"></i> Create / Edit News</a></li>
            <!--<li><a href="multiple_image_upload.php" target="abc"><i class="fa fa-angle-double-right"></i> Multiple News Image</a></li>-->
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-edit"></i> <span>Gallery Management</span> <i class="fa fa-angle-left pull-right"></i> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('backend/gallery'); ?>" target="abc"><i class="fa fa-angle-double-right"></i>Photo Gallery</a></li>
            <li><a href="<?php echo base_url('backend/video'); ?>" target="abc"><i class="fa fa-angle-double-right"></i>Video Gallery</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-table"></i> <span>Ads Management</span> <i class="fa fa-angle-left pull-right"></i> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('backend/ads_info'); ?>" target="abc"><i class="fa fa-angle-double-right"></i>Show Ads</a></li>
          </ul>
        </li>
		<!--<li class="treeview"> <a href="#"> <i class="fa fa-table"></i> <span>Namaz time</span> <i class="fa fa-angle-left pull-right"></i> </a>
          <ul class="treeview-menu">
        <li><a href="namaz_info.php" target="abc"><i class="fa fa-angle-double-right"></i>Show Time</a></li>
          </ul>
        </li>-->
        <li class="treeview"> <a href="#"> <i class="fa fa-calendar"></i> <span>Vote Management</span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('backend/vote_message_info'); ?>" target="abc"><i class="fa fa-angle-double-right"></i>Vote Question Create</a></li>
          </ul>
        </li>
        <hr />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" target="blank"><i class="fa fa-angle-double-right"></i>Get worldnews365.org</a>
         <hr /> 
        </li>
      </ul>
    </section>
    <!-- /.sidebar --> 
  </aside>
  
  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Control panel</h1>
      <?php 
          $msg = $this->session->userdata('message');
          if($msg){
              echo $msg;
              $this->session->unset_userdata('message');
          }
      ?>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content"> 
      
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <iframe name="abc" width="100%" height="500px"></iframe>
      </div>
      <!-- /.row --> 
      
      <!-- Main row -->
      <div class="row"> 
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable"> 
          
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom"> 
            <!-- Tabs within a box -->
            <div class="tab-content no-padding"> 
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom --> 
          
          <!-- Chat box --><!-- /.box (chat box) --> 
          
          <!-- TO DO List --><!-- /.box --> 
          
          <!-- quick email widget --> 
        </section>
        <!-- /.Left col --> 
        <!-- right col (We are only adding the ID to make the widgets sortable)--><!-- right col --> 
      </div>
      <!-- /.row (main row) --> 
      
    </section>
    <!-- /.content --> 
  </aside>
  <!-- /.right-side --> 
</div>
<!-- ./wrapper -->
<?php include('page/footer.php');?>