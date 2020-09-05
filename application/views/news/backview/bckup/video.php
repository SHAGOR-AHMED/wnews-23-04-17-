<?php
	require_once("../connection/spUtility.php");
	require_once ("../connection/dbConnection.php");
	$tableName="kha_video_info";
	$keyField="video_id";
	$count=mysql_query("SELECT COUNT(*) FROM $tableName");
	$trow=mysql_fetch_row($count);
	$total=$trow[0]-1;
	if(isset($_POST["txtRec"]))
	{
		$rec=$_POST["txtRec"];
	}
	else
	$rec=0;
	
	$MSG="";
	//UserName
	//UserPass
/**********Add Record*********************************************************************************/

	if(isset($_POST['btnAdd']))
	{
			$id=$CodeSystem->MakeID("VID-",7,$tableName,$keyField);
			$sql="INSERT INTO $tableName(video_id,video_youtube_id,video_status)
			VALUES
			( '".$id."',
			  '".$_POST["video_youtube_id"]."',
			  '1'
			)";	
			$result=mysql_query($sql);
			$MSG = $result?"Data added successfully..":"data added unsuccessfully..";
		}
		else
		$MSG="Please! Inser Your Name and Password";

/**********Edit Record*********************************************************************************/
	if(isset($_POST["btnEdit"]))
	{
		$sql="UPDATE $tableName SET 
			  video_youtube_id='".$_POST["video_youtube_id"]."'
			  WHERE $keyField = '".$_POST["video_id"]."'";
		$result = mysql_query($sql);
		$MSG = $result?"Update data successfully":"data update unsuccessfully";
	}
/*********Delete Record****************************************************************/
	
	if(isset($_POST['btnDelete']))
	{
		$sql="DELETE  FROM $tableName WHERE $keyField='".$_POST["video_id"]."'";
		$result=mysql_query($sql);
		$MSG =$result ? "data deleted successfully." : "Error  data deleted unsuccessfully.";
	}

	
/***************************************************************************************/
	if(isset($_POST['btnShow']))
	{
		
		$sql = "SELECT * FROM $tableName";
		$MSG=$CodeSystem->ShowDetails("$sql","","","","","","");
		
	}
/********Show First Record***********************************************************/
	if(isset($_POST['btnFirst']))
	{
		$rec= 0;
		$MSG= "This is First Record";
	}
	
/********Show Next Record***********************************************************/
	if(isset($_POST['btnNext']))
	{
		$rec++;
		if($rec > $total)
		$rec=$total;
		$MSG="This is Next Record..";
	}

/******Previous Record***************************************************************************/

	if(isset($_POST['btnPrevious']))
	{
		$rec--;
		if($rec < 0)
		$rec = 0;	
		$MSG ="This is Previous Record...";	
	}
/*******Last Record****************************************************************************/
	
	if(isset($_POST['btnLast']))
	{
		$rec = $total;
		$MSG = "This is Last Record";	
	}
	
/************************************************************************************/

	$sql="SELECT * FROM $tableName LIMIT $rec,1";
	$result=mysql_query($sql);
	$row=mysql_fetch_row($result);
		
?>

<form method="post" name="form1" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

<div class="col-md-8" style="margin-left:180px; margin-top:20px;">
<div class="box">
      <div class="box-header">
        <h3 class="box-title">Videos Information</h3>
      </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tr>
                    <td>&nbsp;</td>
                    <td>Video ID</td>
                    <td><label for="video_id"></label>
                  <input name="video_id" type="text" id="video_id" readonly="readonly" value="<?php echo $row[0];?>" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Youtube ID</td>
                    <td><label for="admin_user"></label>
                  <input type="text" name="video_youtube_id" id="video_youtube_id" value="<?php echo $row[1];?>" /></td>
                </tr>
                <tr>
                  <td colspan="2" align="center">
                 	<input name="btnAdd" type="submit" class="btn btn-success btn-sm" id="btnAdd" value="Add" onclick="return(confirm('Are You Sure?'));" />
                    <input name="btnEdit" type="submit" class="btn btn-info btn-sm" id="btnEdit" value="Edit" onclick="return(confirm('Are You Sure?'));" />
                    <input name="btnDelete" type="submit" class="btn btn-danger btn-sm" id="btnDelete" value="Delete" onclick="return(confirm('Are You Sure?'));" />
                    <input name="btnShow" type="submit" class="btn btn-warning btn-sm" id="btnShow" value="Show" /></td>
                  <td>
                    <input name="btnFirst" type="submit" class="btn btn-success btn-sm" id="btnFirst" value="|<<" />
                    <input name="btnPrevious" type="submit" class="btn btn-success btn-sm" id="btnPrevious" value="<<" />
                    <input name="btnNext" type="submit" class="btn btn-success btn-sm" id="btnNext" value=">>" />
                    <input name="btnLast" type="submit" class="btn btn-success btn-sm" id="btnLast" value=">>|" /></td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $MSG; ?>
                    <input type="hidden" name="txtRec" id="txtRec" value="<?php print $rec ?>" /></td>
                </tr>
            </table>
      </div><!-- /.box-body -->
    </div>
</div> 
</form>

