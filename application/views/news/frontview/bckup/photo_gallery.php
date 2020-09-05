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

<!-- kkaayf gallery view -->
	<link rel="stylesheet" href="view_file/vlb_files1/vlightbox1.css" type="text/css" />
	<link rel="stylesheet" href="view_file/vlb_files1/visuallightbox.css" type="text/css" media="screen" />
	<!--<script src="view_file/vlb_engine/jquery.min.js" type="text/javascript"></script>-->
	<script src="view_file/vlb_engine/visuallightbox.js" type="text/javascript"></script>
<!-- kkaayf gallery view -->


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
			<td align="center"> <h2>Photo Gallery</h2></td>
		</tr>
		<tr>
			<td>
			 <!--- photo Gallery -->  
								
				<div id="vlightbox1">
				
				<?php
					$sql="SELECT * FROM kha_gallery_info ORDER by GalleryID DESC";
					$query=mysql_query($sql);
					while($portraitInfo = mysql_fetch_row($query) )
					{
				?>
				
					<a class="vlightbox1" href="img/gallery/<?php echo $portraitInfo[0] ; ?>.jpg" title="<?php echo $portraitInfo[1] ; ?>">
					<img src="img/gallery/<?php echo $portraitInfo[0] ; ?>.jpg" alt="<?php echo $portraitInfo[1] ; ?>" style="width:395px; height:300px;"/><?php echo $portraitInfo[1] ; ?>
					</a>
					
				<?php
					}
				?>
				</div>
				<script src="view_file/vlb_engine/thumbscript1.js" type="text/javascript"></script>
				<script src="view_file/vlb_engine/vlbdata1.js" type="text/javascript"></script>		
				
	  <!-- photo Gallery -->
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
