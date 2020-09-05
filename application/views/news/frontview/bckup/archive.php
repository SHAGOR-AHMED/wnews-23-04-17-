<?php
	require_once ("connection/dbConnection.php");
?>

<!DOCTYPE>
<html>
<head>
<title>Archive ।। WorldNews365 </title>
<meta charset="UTF-8" />

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
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">জাতীয়</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE  news_cat_id='NCATID-002' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($JatioHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #393; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$JatioHeadLine[0];?>"><font color="#000000"> <?php echo $JatioHeadLine[2];?></font></a></div>
    <?php } ?> 
    </div> 
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #D22323;border-top: 3px solid #D22323;"><font color="#D22323" size="5px">রাজনীতি</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-003' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($RajnitiHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #D22323; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$RajnitiHeadLine[0];?>"><font color="#000000"> <?php echo $RajnitiHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #0609F2;border-top: 3px solid #0609F2;"><font color="#0609F2" size="5px">অর্থ-বাণিজ্য </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-004' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($BabsaHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #0609F2; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$BabsaHeadLine[0];?>"><font color="#000000"> <?php echo $BabsaHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
	
	<!-- ============================================== -->  
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #0180B7;border-top: 3px solid #0180B7;"><font color="#0180B7" size="5px">আন্তর্জাতিক</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE  news_cat_id='NCATID-008' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($AntorJatik=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #0180B7; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$AntorJatik[0];?>"><font color="#000000"> <?php echo $AntorJatik[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== --> 

    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #0180B7;border-top: 3px solid #0180B7;"><font color="#0180B7" size="5px">মতামত</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE  news_cat_id='NCATID-017' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($AntorJatik=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #0180B7; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$AntorJatik[0];?>"><font color="#000000"> <?php echo $AntorJatik[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>   
<!-- ============================================== --> 

    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #0180B7;border-top: 3px solid #0180B7;"><font color="#0180B7" size="5px">সম্পাদকীয়</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE  news_cat_id='NCATID-022' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($AntorJatik=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #0180B7; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$AntorJatik[0];?>"><font color="#000000"> <?php echo $AntorJatik[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>   
<!-- ============================================== --> 

    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #0180B7;border-top: 3px solid #0180B7;"><font color="#0180B7" size="5px">সাক্ষাৎকার </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE  news_cat_id='NCATID-018' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($AntorJatik=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #0180B7; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$AntorJatik[0];?>"><font color="#000000"> <?php echo $AntorJatik[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>   
<!-- ============================================== --> 
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #0CD2DA;border-top: 3px solid #0CD2DA;"><font color="#0CD2DA" size="5px">খেলাধুলা </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-005' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($KhalaHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #0CD2DA; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$KhalaHeadLine[0];?>"><font color="#000000"> <?php echo $KhalaHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>

  <!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #B601DA;border-top: 3px solid #B601DA;"><font color="#B601DA" size="5px">বিনোদন</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-010' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #B601DA; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php echo $BinodonHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #39B2F5;border-top: 3px solid #39B2F5;"><font color="#39B2F5" size="5px">বিজ্ঞান ও প্রযুক্তি</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-011' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($BigganHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #39B2F5; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$BigganHeadLine[0];?>"><font color="#000000"> <?php echo $BigganHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #39B2F5;border-top: 3px solid #39B2F5;"><font color="#39B2F5" size="5px">শিক্ষাংগন</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-009' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($BigganHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #39B2F5; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$BigganHeadLine[0];?>"><font color="#000000"> <?php echo $BigganHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->      
	<div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #39B2F5;border-top: 3px solid #39B2F5;"><font color="#39B2F5" size="5px">স্বাস্থ্য </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-028' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($BigganHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #39B2F5; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$BigganHeadLine[0];?>"><font color="#000000"> <?php echo $BigganHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->  
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">বিজয়ী নারী</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-026' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($DhormoChintaHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$DhormoChintaHeadLine[0];?>"><font color="#000000"> <?php echo $DhormoChintaHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->       
	<div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">ছোটদের পাতা</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-037' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($DhormoChintaHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$DhormoChintaHeadLine[0];?>"><font color="#000000"> <?php echo $DhormoChintaHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
	<div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">পর্যটন </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-030' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($DhormoChintaHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$DhormoChintaHeadLine[0];?>"><font color="#000000"> <?php echo $DhormoChintaHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->	
	<div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">উন্নয়ন বার্তা  </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-012' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($DhormoChintaHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$DhormoChintaHeadLine[0];?>"><font color="#000000"> <?php echo $DhormoChintaHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->  
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">আমাদের মুক্তিযুদ্ধ</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-019' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($MuktiJuddhoHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$MuktiJuddhoHeadLine[0];?>"><font color="#000000"> <?php echo $MuktiJuddhoHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->  
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #DE7223;border-top: 3px solid #DE7223;"><font color="#DE7223" size="5px">স্বাস্থ্য</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-502' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($SasthoHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #DE7223; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$SasthoHeadLine[0];?>"><font color="#000000"> <?php echo $SasthoHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>

<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #1893B4;border-top: 3px solid #1893B4;"><font color="#1893B4" size="5px">ফিচার</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-043 ' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($LifeStyleHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #1893B4; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$LifeStyleHeadLine[0];?>"><font color="#000000"> <?php echo $LifeStyleHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51CB5;border-top: 3px solid #F51CB5;"><font color="#F51CB5" size="5px">আইন ও অপরাধ </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-025' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($AadalotHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51CB5; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$AadalotHeadLine[0];?>"><font color="#000000"> <?php echo $AadalotHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">চাকরির খবর </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-046' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($NariShishuHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$NariShishuHeadLine[0];?>"><font color="#000000"> <?php echo $NariShishuHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->  
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #5589E3;border-top: 3px solid #5589E3;"><font color="#5589E3" size="5px">প্রবাস জীবন </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-047' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($CrimeHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #5589E3; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$CrimeHeadLine[0];?>"><font color="#000000"> <?php echo $CrimeHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #AB08FF;border-top: 3px solid #AB08FF;"><font color="#AB08FF" size="5px">বিশেষ সংখ্যা </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-040' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($FicarHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #AB08FF; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$FicarHeadLine[0];?>"><font color="#000000"> <?php echo $FicarHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">শিল্প ও সাহিত্য </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-038' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($JibonAcarHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$JibonAcarHeadLine[0];?>"><font color="#000000"> <?php echo $JibonAcarHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">নোটিশ বোর্ড </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-041' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($ParobasHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$ParobasHeadLine[0];?>"><font color="#000000"> <?php echo $ParobasHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">জীবন যাত্রা </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-039' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($CakriHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$CakriHeadLine[0];?>"><font color="#000000"> <?php echo $CakriHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
	<div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">ভ্রমণ </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-042' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php echo $BinodonHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
	<div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">ফেইসবুক থেকে  </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-006' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php echo $BinodonHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== --> 
    <!-- Saradesh Start -->
    <div>
        <img src="images/saradesh.jpg" style="width:100%; margin:10px 0 5px;" />
    </div>

<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">ঢাকা</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-014' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($DhakaHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$DhakaHeadLine[0];?>"><font color="#000000"> <?php echo $DhakaHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">চট্টগ্রাম</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-031' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($ChittagongHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$ChittagongHeadLine[0];?>"><font color="#000000"> <?php echo $ChittagongHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">রাজশাহী</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-032' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($RajshahiHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$RajshahiHeadLine[0];?>"><font color="#000000"> <?php echo $RajshahiHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">কুমিল্লা</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-013' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($KumillaHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$KumillaHeadLine[0];?>"><font color="#000000"> <?php echo $KumillaHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">খুলনা</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-033' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($KulnaHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$KulnaHeadLine[0];?>"><font color="#000000"> <?php echo $KulnaHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">বরিশাল</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-034' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($BarisalHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$BarisalHeadLine[0];?>"><font color="#000000"> <?php echo $BarisalHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">সিলেট</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-035' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($SylhetHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$SylhetHeadLine[0];?>"><font color="#000000"> <?php echo $SylhetHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
    <div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">রংপুর</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-036' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($RangpurHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$RangpurHeadLine[0];?>"><font color="#000000"> <?php echo $RangpurHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    

	<div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">ফরিদপুর </font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-016' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($RangpurHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$RangpurHeadLine[0];?>"><font color="#000000"> <?php echo $RangpurHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    
	<div class="post" style="margin-top: -10px;">
    <div style="border-bottom: 1px solid #F51414;border-top: 3px solid #F51414;"><font color="#F51414" size="5px">মায়মনসিংহ</font></div>
    <div style="margin-top: -10px;height:400px;border:1px solid #ccc;overflow:auto;margin-top:5px;">
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-015' AND DATE_FORMAT(news_date,'%Y-%m-%d')='".$_POST["datepicker"]."'";
	$query=mysql_query($sql);
	while($RangpurHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #F51414; line-height: 20px; margin-left: 5px;"><img src="images/min_arrow.jpg" alt="Arrow Pic" width="8"/><a href="<?php echo 'news_details.php?ID='.$RangpurHeadLine[0];?>"><font color="#000000"> <?php echo $RangpurHeadLine[2];?></font></a></div>
    <?php } ?>  
    </div>
    </div>
<!-- ============================================== -->    

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
