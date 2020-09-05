<?php
	require_once ("connection/dbConnection.php");
	require_once ("connection/spUtility.php");
	if(isset($_POST["butMemSubmit"]))
	{
		$id=$CodeSystem->MakeID("MEMID-",12,'kha_visitor_info','visitor_id');
		$sql="INSERT INTO kha_visitor_info(
											visitor_id,
											visitor_name,
											visitor_email,
											visitor_pass,
											visitor_join_date,
											visitor_status)
											VALUES(
											'".$id."',
											'".$_POST["txtName"]."',
											'".$_POST["txtEmail"]."',
											'".$_POST["mem_password1"]."',
											'".$CodeSystem->SPDate()."',
											'1'
											)";
		$query=mysql_query($sql);
		move_uploaded_file($_FILES["filePic"]["tmp_name"],"images/member/$id.jpg");
	}
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
<script>
function checkPass()
{
    var pass1 = document.getElementById('mem_password1');
    var pass2 = document.getElementById('mem_password2');
    var message = document.getElementById('confirmMessage');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    if(pass1.value == pass2.value){
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  

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
    <form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
      <table s="s" width="506" height="268" border="0" align="center" style="margin-left:10px;">
        <tr>
          <td height="72" colspan="2"><h2>Please Fill Your Personal Information</h2></td>
        </tr>
        <tr>
          <td width="184" height="23">Your Name</td>
          <td width="312"><label for="textfield"></label>
            <input name="txtName" type="text" id="txtName" size="40" /></td>
        </tr>
        <tr>
          <td height="29">Your Email</td>
          <td><input name="txtEmail" type="text" id="txtEmail" size="40" /></td>
        </tr>
        <tr>
          <td height="22"> Your Password</td>
          <td><input name="mem_password1" type="password" id="mem_password1" size="40" /></td>
        </tr>
        <tr>
          <td height="26">Confirm Password</td>
          <td><input name="mem_password2" type="password" id="mem_password2" size="40" onkeyup="checkPass(); return false;" required="required" /></td>
        </tr>
        <tr>
          <td height="26">Image</td>
          <td><label for="filePic"></label>
          <input type="file" name="filePic" id="filePic" /></td>
        </tr>
        <tr>
          <td height="54" colspan="2" align="center"><input type="submit" name="butMemSubmit" id="button2" value="         Submit         " /></td>
        </tr>
      </table>
    </form>

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
