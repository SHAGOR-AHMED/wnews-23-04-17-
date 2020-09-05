    <!---------------------------------------------->
        <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-002' ORDER BY news_id DESC";
	$query=mysql_query($sql);
	$JatioImage=mysql_fetch_row($query)
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">জাতীয়</font></div>
      <div class="thumb"><img src="images/news/<?php echo $JatioImage[0];?>.jpg" alt="" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE  news_cat_id='NCATID-002' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($JatioHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282; "><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:4px;" /><a href="<?php echo 'news_details.php?ID='.$JatioHeadLine[0];?>"><font color="#000000"> <?php echo $JatioHeadLine[2];?></font></a>
	  </div>
      <?php } ?>
    </div>
    <!---------------------------------------------->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-003' ORDER BY news_id DESC";
	$query=mysql_query($sql);
	$RajnitiImage=mysql_fetch_row($query)
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">রাজনীতি</font></div>
      <div class="thumb"><img src="images/news/<?php echo $RajnitiImage[0];?>.jpg" alt="" /></a></div>
	  
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-003' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($RajnitiHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$RajnitiHeadLine[0];?>"><font color="#000000"> <?php echo $RajnitiHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!---------------------------------------------->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-004' ORDER BY news_id DESC ";
	$query=mysql_query($sql);
	$BideshImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">অর্থ ও বাণিজ্য</font></div>
      <div class="thumb"><img src="images/news/<?php echo $BideshImage[0];?>.jpg" alt="" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-004' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($BideshHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$BideshHeadLine[0];?>"><font color="#000000"> <?php echo $BideshHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
   
    <!---------------------------------------------->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-005' ORDER BY news_id DESC";
	$query=mysql_query($sql);
	$KhalaImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">খেলাধুলা</font></div>
      <div class="thumb"><img src="images/news/<?php echo $KhalaImage[0];?>.jpg" alt="" style="width:300px;" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE  news_cat_id='NCATID-005' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($KhalaHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$KhalaHeadLine[0];?>"><font color="#000000"> <?php echo $KhalaHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!---------------------------------------------->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-008' ORDER BY news_id DESC";
	$query=mysql_query($sql);
	$ChitaImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">আন্তর্জাতিক</font></div>
      <div class="thumb"><img src="images/news/<?php echo $ChitaImage[0];?>.jpg" alt="" style="width:300px;" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-008' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($ChitaHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$ChitaHeadLine[0];?>"><font color="#000000"> <?php echo $ChitaHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!-- ------------------------------------------ -->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-010' ORDER BY news_id DESC ";
	$query=mysql_query($sql);
	$BinodonImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">বিনোদন</font></div>
      <div class="thumb"><img src="images/news/<?php echo $BinodonImage[0];?>.jpg" alt="" style="width:300px;" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-010' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php echo $BinodonHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    
    <!---------------------------------------------->
    <?php
	//$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-008' ORDER BY news_id DESC ";
	//$query=mysql_query($sql);
	//$ProbasImage=mysql_fetch_row($query)
	
?>
    <!--<div class="post" style="margin-top: -10px; width: 310px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">এক্সক্লুসিভ</font></div>
      <div class="thumb"><img src="images/news/<?php //echo $ProbasImage[0];?>.jpg" alt="<?php //echo $ProbasImage[2];?>" style="width:300px;" /></a></div>
      <?php
	//$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-008' ORDER BY news_id DESC LIMIT 4";
	//$query=mysql_query($sql);
	//while($ProbasHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #848484;"><img src="images/min-arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php //echo 'news_details.php?ID='.$ProbasHeadLine[0];?>"><font color="#000000"> <?php //echo $ProbasHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!---------------------------------------------->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-011' ORDER BY news_id DESC";
	$query=mysql_query($sql);
	$BinodonImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">বিজ্ঞান ও প্রযুক্তি</font></div>
      <div class="thumb"><img src="images/news/<?php echo $BinodonImage[0];?>.jpg" alt="" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-011' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php echo $BinodonHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!---------------------------------------------->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-026' ORDER BY news_id DESC";
	$query=mysql_query($sql);
	$BinodonImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">বিজয়ী নারী</font></div>
      <div class="thumb"><img src="images/news/<?php echo $BinodonImage[0];?>.jpg" alt="" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-026' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/min-arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php echo $BinodonHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!---------------------------------------------->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-019' ORDER BY news_id DESC ";
	$query=mysql_query($sql);
	$ShikkhaImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">আমাদের মুক্তিযুদ্ধ</font></div>
      <div class="thumb"><img src="images/news/<?php echo $ShikkhaImage[0];?>.jpg" alt="" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-019' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($ShikkhaHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$ShikkhaHeadLine[0];?>"><font color="#000000"> <?php echo $ShikkhaHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!-- bibidho start -->
    <!-- ************************************** -->
    <?php
	//$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-507' ORDER BY news_id DESC ";
	//$query=mysql_query($sql);
	//$BinodonImage=mysql_fetch_row($query)
	
?>
    <!--<div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">ফিচার</font></div>
      <div class="thumb"><img src="images/news/<?php //echo $BinodonImage[0];?>.jpg" alt="" /></a></div>
      <?php
	//$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-507' ORDER BY news_id DESC LIMIT 4";
	//$query=mysql_query($sql);
	//while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #848484;"><img src="images/min-arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php //echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php //echo $BinodonHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!-- *************************************** -->
    <?php
	//$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-503' ORDER BY news_id DESC ";
	//$query=mysql_query($sql);
	//$BinodonImage=mysql_fetch_row($query)
	
?>
    <!--<div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">লাইফস্টাইল</font></div>
      <div class="thumb"><img src="images/news/<?php //echo $BinodonImage[0];?>.jpg" alt="" /></a></div>
      <?php
	//$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-503' ORDER BY news_id DESC LIMIT 4";
	//$query=mysql_query($sql);
	//while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #848484;"><img src="images/min-arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php //echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php //echo $BinodonHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!-- *************************************** -->
    <?php
	//$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-501' ORDER BY news_id DESC ";
	//$query=mysql_query($sql);
	//$BinodonImage=mysql_fetch_row($query)
	
?>
    <!--<div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">সাহিত্য-সংস্কৃতি</font></div>
      <div class="thumb"><img src="images/news/<?php //echo $BinodonImage[0];?>.jpg" alt="" /></a></div>
      <?php
	//$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-501' ORDER BY news_id DESC LIMIT 4";
	//$query=mysql_query($sql);
	//while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #848484;"><img src="images/min-arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php //echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php //echo $BinodonHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!-- bibidho end -->

    <!-- Saradesh Start -->
    <img src="images/saradesh.jpg" width="818px" />
    <!-- *************************************** -->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-014' ORDER BY news_id DESC ";
	$query=mysql_query($sql);
	$BinodonImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">ঢাকা</font></div>
      <div class="thumb"><img src="images/news/<?php echo $BinodonImage[0];?>.jpg" alt="" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-014' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php echo $BinodonHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!-- *************************************** -->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-031' ORDER BY news_id DESC ";
	$query=mysql_query($sql);
	$BinodonImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">চট্টগ্রাম</font></div>
      <div class="thumb"><img src="images/news/<?php echo $BinodonImage[0];?>.jpg" alt="" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-031' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php echo $BinodonHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!-- *************************************** -->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-032' ORDER BY news_id DESC ";
	$query=mysql_query($sql);
	$BinodonImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">রাজশাহী</font></div>
      <div class="thumb"><img src="images/news/<?php echo $BinodonImage[0];?>.jpg" alt="" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-032' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php echo $BinodonHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!-- *************************************** -->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-013' ORDER BY news_id DESC ";
	$query=mysql_query($sql);
	$BinodonImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">কুমিল্লা</font></div>
      <div class="thumb"><img src="images/news/<?php echo $BinodonImage[0];?>.jpg" alt="" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-013' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php echo $BinodonHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!-- *************************************** -->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-035' ORDER BY news_id DESC ";
	$query=mysql_query($sql);
	$BinodonImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">সিলেট</font></div>
      <div class="thumb"><img src="images/news/<?php echo $BinodonImage[0];?>.jpg" alt="" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-035' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php echo $BinodonHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!-- *************************************** -->
    <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-034' ORDER BY news_id DESC ";
	$query=mysql_query($sql);
	$BinodonImage=mysql_fetch_row($query)
	
?>
    <div class="post" style="margin-top: -10px;">
      <div style="border-bottom: 1px solid #393;border-top: 3px solid #393;"><font color="#393" size="5px">বরিশাল</font></div>
      <div class="thumb"><img src="images/news/<?php echo $BinodonImage[0];?>.jpg" alt="" /></a></div>
      <?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-034' ORDER BY news_id DESC LIMIT 5";
	$query=mysql_query($sql);
	while($BinodonHeadLine=mysql_fetch_row($query))
	{
	?>
      <div style="border-bottom: 1px solid #008282;"><img src="images/arrow.jpg" width="8px" height="8px" alt="" style="margin-top:5px;" /><a href="<?php echo 'news_details.php?ID='.$BinodonHeadLine[0];?>"><font color="#000000"> <?php echo $BinodonHeadLine[2];?></font></a></div>
      <?php } ?>
    </div>
    <!-- Sarasesh End -->