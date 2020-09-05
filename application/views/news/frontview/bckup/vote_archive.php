<?php
	require_once ("connection/dbConnection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>WorldNews365</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="icon" type="image/ico" href="images/fav.png" />
<link href="images/fav.png" rel="shortcut icon" type="image/x-icon" />
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

    <!--menu details start-->
    <div  style="margin-top: 10px;">
    <div style="border-bottom: 4px solid #008282;border-top: 4px solid #008282;"><font color="#DC1000" size="5px" style="margin-left:10px;">অনলাইন জরিপের পুরোনো ফলাফল</font></div>

<?php
	$i=1;
	$sql="SELECT * FROM kha_vote_message_info ORDER BY vote_msg_id DESC";
	$query=mysql_query($sql);
	while($fetch=mysql_fetch_row($query))
	{
	
		$TotalVote=0;
		$sql1="SELECT COUNT(vote_id) AS total,vote_vote_count FROM kha_vote_info WHERE vote_vote_msg_id='".$fetch[0]."' GROUP BY vote_vote_count";
		$query1=mysql_query($sql1);
		while($AllVoteVote=mysql_fetch_row($query1))
		{
			$TotalVote=$TotalVote+$AllVoteVote[0];
			if($AllVoteVote[1]=='Yes')
			{
				$Yes=$AllVoteVote[0];
			}
			else if($AllVoteVote[1]=='No')
			{
				$No=$AllVoteVote[0];
			}
			else if($AllVoteVote[1]=='No Comment')
			{
				$NoComment=$AllVoteVote[0];
			}
		}
		$TotalVote;
		$Yes=($Yes*100)/$TotalVote;
		$No=($No*100)/$TotalVote;
		$NoComment=($NoComment*100)/$TotalVote;
		
?>


<table style="margin-left:10px;">
  <tr>
        <p style="margin-left:10px;">Published: <?php echo $fetch[2];?></p>
  		<td height="50" style="border-bottom: 1px solid #008282; margin-left:5px;"><h5><?php echo $i++;?>.&nbsp;&nbsp;<?php echo $fetch[1];?></h5></td>
  </tr>
  <tr>
    <td height="40" style="border-bottom: 1px solid #008282; margin-left:5px;">ভোট দিয়েছেন <?php echo BanglaNumber($TotalVote); ?> জন </td>
    </tr>
  <tr>
    <td height="40" style="border-bottom: 2px solid #008282; margin-left:5px;">হ্যাঁ-<?php echo BanglaNumber(number_format($Yes)); ?>%  &nbsp; না-<?php echo BanglaNumber(number_format($No)); ?>% &nbsp; মন্তব্য নেই-<?php echo BanglaNumber(number_format($NoComment)); ?>%</td>
    </tr>
</table>

<?php } ?>

</div>
<!---------------------------------------------->    

















  


    <!--menu details end-->
    
    <!-- end post navigation -->
  </div>
  <!-- END content -->
  <!-- BEGIN sidebar -->
<?php require_once('sidebar.php');?>
  <!-- END sidebar -->
  <!-- BEGIN footer -->
<?php require_once('footer.php');?>

  <!-- END footer -->
</div>
<!-- END wrapper -->
</body>
</html>
