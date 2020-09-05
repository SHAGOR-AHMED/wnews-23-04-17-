<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['namaz_edit']) && !empty($_GET['namaz_edit']))
	{
		$id = $_GET['namaz_edit'];
		$stmt_edit = $DB_con->prepare('SELECT namaz_title FROM nc_namaz_time WHERE id =:id');
		$stmt_edit->execute(array(':id'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: namaz_info.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$site_link = $_POST['site_link'];// Your Site Link
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = '../images/namaz/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$namaz_title = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 2000000)
				{
					unlink($upload_dir.$edit_row['namaz_title']);
					move_uploaded_file($tmp_dir,$upload_dir.$namaz_title);
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
			$namaz_title = $edit_row['namaz_title']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE nc_namaz_time 
									     SET namaz_title=:namaz_title 
								       WHERE id=:id');
			$stmt->bindParam(':namaz_title',$namaz_title);
			$stmt->bindParam(':id',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='namaz_info.php';
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
        <h3 class="box-title">|| Update ||</h3>
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
			<td><label class="control-label">Namaz Time</label></td>
			<td>
				<p><img src="../images/namaz/<?php echo $namaz_title; ?>" height="150" width="150" /></p>
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

