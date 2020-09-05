<?php
	require_once ("connection/dbConnection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>WorldNews365</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="ie.css" /><![endif]-->
<link rel="stylesheet" type="text/css" href="slider/style.css" />
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
<?php require_once('page/header.php');?>
<?php require_once('page/menu.php');?>
  <!-- END header -->
  <!-- BEGIN content -->
  <div id="content">
    <!-- begin post navigation -->
    <div class="break"></div>
    
    <table width="100%" border="1">
		<tr style="background: #066; color: #fff; height:30px; width:100%; text-align:center; font-size:24px;">
			<td align="center"> <h2>Video Gallery</h2></td>
		</tr>
		<tr>
			<td>
			  <?php 
			  $sql="SELECT * FROM kha_video_info ORDER BY video_id DESC LIMIT 6";
			  $query=mysql_query($sql);
			  while($video=mysql_fetch_row($query))
			  {
			  ?>
			<div class="video"> 
				<div style="float:left; min-height:200px; width:400px; margin-right:7px; border-bottom:10px solid #ffffff;">
					 <div style="background: #B30000; color:#FFFFFF; height:33px; width:400px; text-align:center; font-size:24px;"><?php echo $video[2];?>
					 </div>
					<iframe width="400" height="330" src="//www.youtube.com/embed/<?php echo $video[1];?>" frameborder="0" allowfullscreen>
					</iframe>
				</div>
			</div>
			  <?php
			  }
			  ?>
			</td>
		</tr>
	</table>    
    <!-- end post navigation -->
  </div>
  <!-- END content -->
  <!-- BEGIN sidebar -->
<?php require_once('page/sidebar.php');?>
  <!-- END sidebar -->
  <!-- BEGIN footer -->
<?php require_once('page/footer.php');?>

  <!-- END footer -->
</div>
<!-- END wrapper -->
</body>
</html>
