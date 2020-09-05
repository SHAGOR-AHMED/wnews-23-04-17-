<?php
	require_once("../connection/spUtility.php");
	require_once ("../connection/dbConnection.php");
	$tableName="kha_news_info";
	$keyField="news_id";
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
			$id=$CodeSystem->MakeID("NID-",20,$tableName,$keyField);
			$sql="INSERT INTO $tableName(news_id,news_cat_id,news_headline,news_details,news_date,news_top_page_status,news_status,news_unique_msg)
			VALUES
			( '".$id."',
			  '".$_POST["news_cat_id"]."',
			  '".filter_var(trim(($_POST["news_headline"])), FILTER_SANITIZE_STRING)."',
			  '".$_POST["news_details"]."',
			  '".$CodeSystem->SPDate()."',
			  '".$_POST["news_top_page_status"]."',
			  '1',
			  '".$_POST["news_unique_msg"]."'
			)";	
			$result=mysql_query($sql);
			$MSG = $result?"Data added successfully..":"data added unsuccessfully..";
			move_uploaded_file($_FILES["filePic"]["tmp_name"],"../images/news/$id.jpg");
	}

/**********Edit Record*********************************************************************************/
	if(isset($_POST["btnEdit"]))
	{
		$a=$_POST['news_id'];
		$sql="UPDATE $tableName SET 
			  news_cat_id='".$_POST["news_cat_id"]."',
			  news_headline='".filter_var(trim(($_POST["news_headline"])), FILTER_SANITIZE_STRING)."',
			  news_details='".$_POST["news_details"]."',
			  news_date='".$CodeSystem->SPDate()."',
			  news_top_page_status='".$_POST["news_top_page_status"]."',
			  news_unique_msg='".$_POST["news_unique_msg"]."'
			  WHERE $keyField = '".$_POST["news_id"]."'";
		$result = mysql_query($sql);
		$MSG = $result?"Update data successfully":"data update unsuccessfully";
		move_uploaded_file($_FILES["filePic"]["tmp_name"],"../images/news/$a.jpg");
	}
/*********Delete Record****************************************************************/
	
	if(isset($_POST['btnDelete']))
	{
		$a=$_POST['news_id'];
		$sql="DELETE  FROM $tableName WHERE $keyField='".$_POST["news_id"]."'";
		$result=mysql_query($sql);
		$MSG =$result ? "data deleted successfully." : "Error  data deleted unsuccessfully.";
		unlink("../images/news/".$a.".jpg");
	}

	
/***************************************************************************************/
	if(isset($_POST['btnShow']))
	{
		$sql = "SELECT
					kha_news_info.news_id
					, kha_news_category_info.news_cat_name
					, kha_news_info.news_headline
					, kha_news_info.news_details
					, kha_news_info.news_date
					, kha_news_info.news_top_page_status
				FROM
					kha_news_info
					INNER JOIN kha_news_category_info 
						ON (kha_news_info.news_cat_id = kha_news_category_info.news_cat_id)";
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
	
	if(isset($_POST['btnSearch']))
	{
	$sql="SELECT * FROM $tableName WHERE news_id='".$_POST["news_search"]."'";
	$result=mysql_query($sql);
	}
	
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
        <h3 class="box-title">News Information</h3>
        <div align="right"><table width="385">
  <tr>
    <td width="132">Search By News ID</td>
    <td width="237"><input type="text" name="news_search" id="news_search" />
      <input name="btnSearch" type="submit" class="btn btn-success btn-sm" id="btnSearch" value="   GO   "/></td>
  </tr>
</table>
</div>
      </div><!-- /.box-header -->
      <div class="box-body no-padding">
<table width="973" align="center" class="table table-condensed">
                <tr>
                    <td width="2">&nbsp;</td>
                    <td width="643">News ID</td>
                    <td width="480"><label for="news_id"></label>
                  <input name="news_id" type="text" id="news_id" readonly="readonly" value="<?php echo $row[0];?>" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>News Category ID</td>
                  <td><?php print $CodeSystem->MakeCBOEx("select * from kha_news_category_info","news_cat_id",$row[1],"","","","Choose News Category"); ?></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2">News Headline
					<textarea id="news_headline" name="news_headline" rows="3" cols="80"><?php echo $row[2];?></textarea></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2">News Details          
                    <label for="news_details"></label>
                    <textarea id="news_details" name="news_details" rows="10" cols="80"><?php echo $row[3];?></textarea></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>News Unique Message</td>
                  <td><label for="news_unique_msg"></label>
                  <input type="text" name="news_unique_msg" id="news_unique_msg" value="<?php echo $row[9];?>"/></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>News Top Page Status</td>
                  <td><select name="news_top_page_status" id="select">
                    <option selected="selected"><?php echo $row[6];?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>News Image</td>
                  <td><input type="file" name="filePic" id="filePic" /></td>
                </tr>
                <tr>
                  <td colspan="2" align="center">
                 	<input name="btnAdd" type="submit" class="btn btn-success btn-sm" id="btnAdd" value="Add" onclick="return(confirm('Are You Sure?'));" />
                    <input name="btnEdit" type="submit" class="btn btn-info btn-sm" id="btnEdit" value="Edit" onclick="return(confirm('Are You Sure?'));" />
                    <input name="btnDelete" type="submit" class="btn btn-danger btn-sm" id="btnDelete" value="Delete" onclick="return(confirm('Are You Sure?'));" />
                    <!--<input name="btnShow" type="submit" class="btn btn-warning btn-sm" id="btnShow" value="Show" />--></td>
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
                CKEDITOR.replace('news_headline');
                CKEDITOR.replace('news_details');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>



</form>

