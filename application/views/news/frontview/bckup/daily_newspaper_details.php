<?php
	require_once ("connection/dbConnection.php");
	 $sql="SELECT * FROM kha_dailynewspaper_details WHERE dailynewspaper_details_id='".$_GET["ID"]."'";
	 $query=mysql_query($sql);
	 $fetch=mysql_fetch_object($query);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>News Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="ie.css" /><![endif]-->
<link rel="stylesheet" type="text/css" href="slider/style.css?version=new" />
<script type="text/javascript" src="slider/js/jquery-1.8.2.js" ></script>
<script type="text/javascript" src="slider/js/jquery-ui-1.9.0.custom.min.js" ></script>
<script type="text/javascript" src="slider/js/jquery-ui-tabs-rotate.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
	});
</script>


</head>
<body>
<!-- BEGIN wrapper -->
<div id="wrapper">
  <!-- BEGIN header -->
<?php require_once('header.php');?>
<?php require_once('menu.php');?>

  <!-- END header -->
  <!-- BEGIN content -->
  <div id="content">
    <!-- begin post -->
    <div class="single">
      <h1><?php echo $fetch->dailynewspaper_headline;?></h1>
      <p>Published: <?php echo $fetch->dailynewspaper_date;?></p>
      <p><img class="alignright" src="images/news/<?php echo $fetch->dailynewspaper_details_id;?>.jpg" width="600" height="350" alt="" /></p>
      <p>&nbsp;</p>
      <p><font size="+1"><?php echo $fetch->dailynewspaper_details;?></font></p>
    </div>
    <!-- end post -->
  </div>
  <!-- END content -->
  <!-- BEGIN sidebar -->
  <?php require_once('sidebar.php');?>
  <!-- END sidebar -->
  <!-- BEGIN footer -->
<?php require_once('footer.php');?>
  <!-- END footer -->
</div>
<!-- END wrapper -->
</body>
</html>
