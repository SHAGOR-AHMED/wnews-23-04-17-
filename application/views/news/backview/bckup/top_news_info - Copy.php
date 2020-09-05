<?php
	require_once("../connection/spUtility.php");
	require_once ("../connection/dbConnection.php");
	$tableName="kha_top_news_info";
	$keyField="top_news_id";
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
			$id=$CodeSystem->MakeID("TNID-",20,$tableName,$keyField);
			$sql="INSERT INTO $tableName(top_news_id,top_news,top_news_date,top_news_status)
			VALUES
			( '".$id."',
			  '".filter_var(trim(($_POST["top_news"])), FILTER_SANITIZE_STRING)."',
			  '".$CodeSystem->SPDate()."',
			  '1'
			)";	
			$result=mysql_query($sql);
			$MSG = $result?"Data added successfully..":"data added unsuccessfully..";
	}

/**********Edit Record*********************************************************************************/
	if(isset($_POST["btnEdit"]))
	{
		$a=$_POST['top_news_id'];
		$sql="UPDATE $tableName SET 
			  top_news='".filter_var(trim(($_POST["top_news"])), FILTER_SANITIZE_STRING)."',
			  top_news_date='".$CodeSystem->SPDate()."'
			  WHERE $keyField = '".$_POST["top_news_id"]."'";
		$result = mysql_query($sql);
		$MSG = $result?"Update data successfully":"data update unsuccessfully";
	}
/*********Delete Record****************************************************************/
	
	if(isset($_POST['btnDelete']))
	{
		$a=$_POST['top_news_id'];
		$sql="DELETE  FROM $tableName WHERE $keyField='".$_POST["top_news_id"]."'";
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
  <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
  <div class="col-md-11" style="margin-left:50px; margin-top:20px;">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Scroll News Information</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table width="973" align="center" class="table table-condensed">
          <tr>
            <td width="1">&nbsp;</td>
            <td width="325">Top News ID</td>
            <td width="631"><label for="top_news_id"></label>
              <input name="top_news_id" type="text" id="top_news_id" readonly="readonly" value="<?php echo $row[0];?>" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2">Scroll News Details
              <label for="top_news"></label>
              <textarea id="top_news" name="top_news" rows="3" cols="80"><?php echo $row[1];?></textarea></td>
          </tr>
          <tr>
         <td colspan="2" align="center"><input name="btnAdd" type="submit" class="btn btn-success btn-sm" id="btnAdd" value="Add" onclick="return(confirm('Are You Sure?'));" />
              <input name="btnEdit" type="submit" class="btn btn-info btn-sm" id="btnEdit" value="Edit" onclick="return(confirm('Are You Sure?'));" />
              <input name="btnDelete" type="submit" class="btn btn-danger btn-sm" id="btnDelete" value="Delete" onclick="return(confirm('Are You Sure?'));" />
              <!--<input name="btnShow" type="submit" class="btn btn-warning btn-sm" id="btnShow" value="Show" />--></td>
            <td><input name="btnFirst" type="submit" class="btn btn-success btn-sm" id="btnFirst" value="|<<" />
              <input name="btnPrevious" type="submit" class="btn btn-success btn-sm" id="btnPrevious" value="<<" />
              <input name="btnNext" type="submit" class="btn btn-success btn-sm" id="btnNext" value=">>" />
              <input name="btnLast" type="submit" class="btn btn-success btn-sm" id="btnLast" value=">>|" /></td>
          </tr>
          <tr>
            <td colspan="3"><?php echo $MSG; ?>
              <input type="hidden" name="txtRec" id="txtRec" value="<?php print $rec ?>" /></td>
          </tr>
        </table>
      </div>
      <!-- /.box-body --> 
    </div>
  </div>
  <!-- jQuery 2.0.2 --> 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> 
  <!-- Bootstrap --> 
  <script src="js/bootstrap.min.js" type="text/javascript"></script> 
  <!-- AdminLTE App --> 
  <script src="js/AdminLTE/app.js" type="text/javascript"></script> 
  <!-- AdminLTE for demo purposes --> 
  <script src="js/AdminLTE/demo.js" type="text/javascript"></script> 
  <!-- CK Editor --> 
  <script src="js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script> 
  <!-- Bootstrap WYSIHTML5 --> 
  <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script> 
  <script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('top_newxs');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
  </script>
</form>
