<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$site_link = $_POST['site_link'];// for site name
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($site_link)){
			$errMSG = "Please Enter Site Link.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = '../adsimage/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$img_name = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '2MB'
				if($imgSize < 2000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$img_name);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO kha_ads_info(site_link,img_name) VALUES(:site_link, :img_name)');
			$stmt->bindParam(':site_link',$site_link);
			$stmt->bindParam(':img_name',$img_name);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:1;ads_info.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>

	

  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
  <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<div class="container">
  
  <div class="col-md-11" style="margin-left:50px; margin-top:20px;">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Total Ads || <a class="btn btn-default" href="ads_info.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Back </a>
		</h3>
        <div></div>
      </div>
      <!-- /.box-header -->
	
	<?php
		if(isset($errMSG)){
				?>
				<div class="alert alert-danger">
					<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
				</div>
				<?php
		}
		else if(isset($successMSG)){
			?>
			<div class="alert alert-success">
				  <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
			</div>
			<?php
		}
	?>  

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
		<tr>
			<td><label class="control-label">Site Link</label></td>
			<td><input class="form-control" type="text" name="site_link" placeholder="Enter Site Link" /></td>
		</tr>
		
		<tr>
			<td><label class="control-label">Image</label></td>
			<td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
		</tr>
		
		<tr>
			<td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
			<span class="glyphicon glyphicon-save"></span> &nbsp; SUBMIT
			</button>
			</td>
		</tr>
    
    </table>
    
</form>
	  
      <!-- /.box-body --> 
    </div>
  </div>
</div> 

