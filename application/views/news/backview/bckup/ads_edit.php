<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['adds_edit']) && !empty($_GET['adds_edit']))
	{
		$id = $_GET['adds_edit'];
		$stmt_edit = $DB_con->prepare('SELECT site_link, img_name FROM kha_ads_info WHERE id =:id');
		$stmt_edit->execute(array(':id'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: ads_info.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$site_link = $_POST['site_link'];// Your Site Link
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = '../adsimage/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$img_name = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 2000000)
				{
					unlink($upload_dir.$edit_row['img_name']);
					move_uploaded_file($tmp_dir,$upload_dir.$img_name);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$img_name = $edit_row['img_name']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE kha_ads_info 
									     SET site_link=:site_link,
										     img_name=:img_name 
								       WHERE id=:id');
			$stmt->bindParam(':site_link',$site_link);
			$stmt->bindParam(':img_name',$img_name);
			$stmt->bindParam(':id',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='ads_info.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
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
        <h3 class="box-title">Update || <a class="btn btn-default" href="ads_info.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Back </a>
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
			<td><input class="form-control" type="text" name="site_link" placeholder="Enter Site Link" value="<?php echo $site_link; ?>" /></td>
		</tr>
		
		<tr>
			<td><label class="control-label">Image</label></td>
			<td>
				<p><img src="../adsimage/<?php echo $img_name; ?>" height="150" width="150" /></p>
				<input class="input-group" type="file" name="user_image" accept="image/*" />
			</td>
		</tr>
		
		<tr>
			<td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
			<span class="glyphicon glyphicon-save"></span> &nbsp; Update
			</button>
			</td>
		</tr>
    
    </table>
    
</form>
	  
      <!-- /.box-body --> 
    </div>
  </div>
</div> 