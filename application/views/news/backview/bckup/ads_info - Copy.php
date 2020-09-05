<?php
	require_once ("dbconfig.php");
	
	// if(isset($_GET['ads_delete'])){
		
	// 	// select image from db to delete
	// 	//$stmt_select = $DB_con->prepare('SELECT img_name FROM kha_ads_info WHERE id =:id');
	// 	//$stmt_select->execute(array(':id'=>$_GET['ads_delete']));
	// 	//$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
	// 	//unlink("../adsimage/".$imgRow['img_name']);
		
	// 	// it will delete an actual record from db
	// 	$stmt_delete = $DB_con->prepare('DELETE FROM kha_ads_info WHERE id =:id');
	// 	$stmt_delete->bindParam(':id',$_GET['ads_delete']);
	// 	$stmt_delete->execute();
		
	// 	header("Location: ads_info.php");
	// }
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
        <h3 class="box-title">|| Total ADs || </h3>
        <div></div>
      </div>
      <!-- /.box-header -->

<div class="row">
	<div class="col-xs-11">
		<table class="table">
			<tr>
				<td> ID </td>
				<td> Site Link </td>
				<td> Image </td>
				<td> Action  </td>
			</tr>	
	<?php
		
		
		$stmt = $DB_con->prepare('SELECT id, site_link, img_name FROM kha_ads_info ORDER BY id ASC');
		$stmt->execute();
		
		if($stmt->rowCount() > 0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);
				?>
				
				<tr>
					<td> <?php echo $id; ?> </td>
					<td> <?php echo $site_link; ?> </td>					
					<td> <img src="../adsimage/<?php echo $row['img_name']; ?>" class="img-rounded" width="300px" height="150px" />
					</td>									
					<td> 
						<span>
							<a class="btn btn-info" href="ads_edit.php?adds_edit=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit </a> 
						</span>
					</td>					
				</tr>
				
				<?php
			}
		}
		else
		{
			?>
			<div class="col-xs-12">
				<div class="alert alert-warning">
					<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
				</div>
			</div>
			<?php
		}
		
	?>
		</table>
	<div>	
</div>	
	  
      <!-- /.box-body --> 
    </div>
  </div>
</div> 

