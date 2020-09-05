<?php
	session_start();
	require_once("../connection/spUtility.php");
	require_once ("../connection/dbConnection.php");

	if($_SESSION['LogStatus']!=1)
	{
		print "<h1>You are not authorized person to view this page</h1>";	
		print "<br><a href='index.php'>Back</a>";
	}
	else
	{
	$count=mysql_query("SELECT COUNT(*) FROM kha_multiple_image_info");
	$trow=mysql_fetch_row($count);
	$total=$trow[0]-1;
	if(isset($_POST["txtRec"]))
	{
		$rec=$_POST["txtRec"];
	}
	else
	$rec=0;
	
	$MSG="";
	//ProjectID
	//ProjectDetailsStatus
/**********Add Record*********************************************************************************/

	if(isset($_POST['btnAdd']))
	{
			$id=$CodeSystem->MakeID("MNID-",15,'kha_multiple_image_info','multi_img_id');
			$sql="INSERT INTO kha_multiple_image_info(multi_img_id,multi_img_link,multi_img_status)
			VALUES
			( '".$id."',
			'images/news/MultiImg/$id.jpg',
			  '1'
			)";	
			$result=mysql_query($sql);
			$MSG = $result?"Data added successfully..":"data added unsuccessfully..";
			move_uploaded_file($_FILES["filePic"]["tmp_name"],"../images/news/MultiImg/$id.jpg");
	}

/**********Edit Record*********************************************************************************/
	if(isset($_POST["btnEdit"]))
	{
		$a=$_POST['multi_img_id'];
		$id=makeid("SELECT MAX(multi_img_id)FROM kha_multiple_image_info","UID-",7);
		$sql="UPDATE kha_multiple_image_info SET multi_img_status='1'
			  WHERE multi_img_id = '".$_POST["multi_img_id"]."'";
		$result = mysql_query($sql);
		$MSG = $result?"Update data successfully":"data update unsuccessfully";
		move_uploaded_file($_FILES["filePic"]["tmp_name"],"../images/news/MultiImg/$a.jpg");
	}
/*********Delete Record****************************************************************/
	
	if(isset($_POST['btnDelete']))
	{
		$a=$_POST['multi_img_id'];
		$sql="DELETE  FROM kha_multiple_image_info WHERE multi_img_id ='".$_POST["multi_img_id"]."'";
		$result=mysql_query($sql);
		$MSG =$result ? "data deleted successfully." : "Error  data deleted unsuccessfully.";
		unlink("../images/news/MultiImg/".$a.".jpg");
	}

	
/***************************************************************************************/
	if(isset($_POST['btnShow']))
	{
		
		$sql = "SELECT * FROM kha_multiple_image_info";
		$result = mysql_query($sql)or die('Error! Query Execute');
		$out="";
		$out=$out . "<table border=\"1\">";
		while ($r=mysql_fetch_row($result))
		{
			$out = $out . "<tr><td>$r[0]</td><td>$r[1]</td></tr>";	
		}
		$out=$out."</table>";
		$MSG=$out . "Total DATA Displayed Successfully";
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

	$sql="SELECT * FROM kha_multiple_image_info ORDER BY multi_img_id DESC LIMIT $rec,1";
	$result=mysql_query($sql);
	$row=mysql_fetch_row($result);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Your  User Information</title>
</head>
<body>
</div>
<table width="693" border="0" align="center" cellpadding="0" cellspacing="0" class="txtFeatures">
  <tr>
    <td width="32%" align="center" valign="bottom" bgcolor="#CCCCCC">
<form method="post" enctype="multipart/form-data" name="fromname" id="checkform" action="<?php $_SERVER['PHP_SELF'] ?>" onsubmit="return(checkform);">
	  <table width="100%" height="283" border="0" align="center" cellpadding="2" cellspacing="2" class="txtLabel">
    <tr>
      <td height="42" colspan="3" align="center" scope="col"><strong>Welcome To Multiple News Image Information</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="25%" rowspan="5"><img src="../images/news/MultiImg/<?php echo $row[0];?>.jpg" width="162" height="117" /></td>
      </tr>
    <tr>
      <td>Image ID</td>
      <td><input name="multi_img_id" type="text" id="multi_img_id" size="30" readonly="readonly" value="<?PHP print $row[0]?>"  /></td>
      </tr>
    <tr>
      <td> Image</td>
      <td><label for="filePic"></label>
        <input type="file" name="filePic" id="filePic" /></td>
      </tr>
    <tr>
      <td colspan="2"><label for="textfield"></label>        <input name="textfield" type="text" id="textfield" size="80" readonly="readonly" value="<?PHP print $row[1]?>" /></td>
      </tr>
    <tr>
      <td width="38%" align="center" valign="top"><input name="btnAdd" type="submit" class="button" id="btnAdd" value="Add" onclick="return(confirm('Are You Sure?'));" />
        <input name="btnEdit" type="submit" class="button" id="btnEdit" value="Edit" onclick="return(confirm('Are You Sure?'));" />
        <input name="btnDelete" type="submit" class="button" id="btnDelete" value="Delete" onclick="return(confirm('Are You Sure?'));" />
        <input name="btnShow" type="submit" class="button" id="btnShow" value="Show" /></td>
      <td><input name="btnFirst" type="submit" class="button" id="btnFirst" value="First" />
        <input name="btnNext" type="submit" class="button" id="btnNext" value="Next" />
        <input name="btnPrevious" type="submit" class="button" id="btnPrevious" value="Previous" />
        <input name="btnLast" type="submit" class="button" id="btnLast" value="Last" />            
      <td>      
    </tr>
    <tr>
      <td colspan="3"></tr>
    <tr>
      <td colspan="3"><?php print $MSG ?></tr>
    <tr>
      <td>
        <td><input type="hidden" name="txtRec" id="txtRec" value="<?php print $rec ?>" /></td>
        <td>&nbsp;</td>
    </tr>
  </table>
  
	</form>	

  </table>
</div>
	</td>
  </tr>
</table>
</div>
<?php 
}
?>
</body>
</html>