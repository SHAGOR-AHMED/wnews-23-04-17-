<?php
	require_once("../connection/spUtility.php");
	require_once ("../connection/dbConnection.php");
	$tableName="kha_admin_info";
	$keyField="admin_id";
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
			$id=$CodeSystem->MakeID("AUID-",10,$tableName,$keyField);
			$sql="INSERT INTO $tableName(admin_id,admin_user_type,admin_user,admin_pass,admin_last_login,admin_ip_address,admin_status)
			VALUES
			( '".$id."',
			  '".$_POST["admin_user_type"]."',
			  '".$_POST["admin_user"]."',
			  '".$_POST["admin_pass"]."',
			  '".$CodeSystem->SPDate()."',
			  '127.01.00.01',
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
		$a=$_POST['admin_id'];
		$id=$CodeSystem->MakeID("AUID-",10,$tableName,$keyField);
		$sql="UPDATE $tableName SET 
			  admin_user_type='".$_POST["admin_user_type"]."',
			  admin_user='".$_POST["admin_user"]."',
			  admin_pass='".$_POST["admin_pass"]."'
			  WHERE $keyField = '".$_POST["admin_id"]."'";
		$result = mysql_query($sql);
		$MSG = $result?"Update data successfully":"data update unsuccessfully";
	}
/*********Delete Record****************************************************************/
	
	if(isset($_POST['btnDelete']))
	{
		$a=$_POST['admin_id'];
		$id=$CodeSystem->MakeID("AUID-",10,$tableName,$keyField);
		$sql="DELETE  FROM $tableName WHERE admin_id ='".$_POST["admin_id"]."'";
		$result=mysql_query($sql);
		$MSG =$result ? "data deleted successfully." : "Error  data deleted unsuccessfully.";
	}

	
/***************************************************************************************/
	if(isset($_POST['btnShow']))
	{
		
		$sql = "SELECT admin_id,admin_user_type,admin_user FROM $tableName";
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
        <h3 class="box-title">Admin User Information</h3>
      </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tr>
                    <td>&nbsp;</td>
                    <td>Admin ID</td>
                    <td><label for="admin_id"></label>
                  <input name="admin_id" type="text" id="admin_id" readonly="readonly" value="<?php echo $admin_info->admin_id; ?>" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>User</td>
                  <td><label for="select"></label>
                    <select name="admin_user_type" id="select">
                      <option value="Admin">Admin</option>
                      <!--<option value="Sub Admin">Sub Admin</option>-->
                  </select></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>User Name</td>
                    <td><label for="admin_user"></label>
                  <input type="text" name="admin_user" id="admin_user" value="<?php echo $admin_info->admin_user; ?>" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>User Password</td>
                    <td><label for="admin_pass"></label>
                  <input type="password" name="admin_pass" id="admin_pass" value="<?php echo $admin_info->admin_pass; ?>" /></td>
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
                    <td colspan="3">
                    <?php 
	                    $msg = $this->session->userdata('message');
	                    if($msg){
	                        echo $msg;
	                        $this->session->unset_userdata('message');
	                    }
                	?>
                    <input type="hidden" name="txtRec" id="txtRec" value="<?php print $rec ?>" /></td>
                </tr>
            </table>
      </div><!-- /.box-body -->
    </div>
</div> 
</form>

