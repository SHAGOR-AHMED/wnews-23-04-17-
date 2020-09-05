<div id="sidebar">
	<div style="position:relative; top:6px;" id="page_sidebar">
    <!-- begin search -->
    <!--<form class="search" action="#">
      <input type="text" name="s" id="s" />
      <button type="submit">অনুসন্ধান</button>
    </form>-->
    <!-- end search -->
      <!-- begin popular posts --><!-- end popular posts -->
    
		<!-- Add 8 Start -->
    <?php
	$sql="SELECT * FROM kha_ads_info WHERE ads_position=8";
	$query=mysql_query($sql);
	$adsShow8=mysql_fetch_row($query);
?>
    <div style=" width:326px; height:200px; position:relative; left:8px; float:left; clear:right; border:1px solid black; margin-bottom:10px; ">
		<a href="<?php echo $adsShow8[2];?>" target="blank"><img src="adsimage/<?php echo $adsShow8[1];?>" alt=""
		style=" width:326px; height:200px; position:relative; float:left;"  /></a>
	</div>
	 <!-- Add 8 End --> 
	 
   <div><h2>Related News</h2></div>
<?php
	 $sql="SELECT * FROM kha_news_info WHERE news_id='".$_GET["ID"]."'";
	 $query=mysql_query($sql);
	 $fetch=mysql_fetch_row($query);


	$sql="SELECT * FROM kha_news_info WHERE news_unique_msg='".$fetch[9]."' ORDER BY news_id DESC LIMIT 1,20";
	$query=mysql_query($sql);
	while($SideNews=mysql_fetch_row($query))
	{
?>
     <div class="ads"> 
    <table width="275" border="0" align="left">
      <tr>
        <td width="104"><img src="images/news/<?php echo $SideNews[0];?>.jpg" alt="" height="80px" width="120px" /></td>
        <td width="141"><a href="<?php echo 'news_details.php?ID='.$SideNews[0];?>"><?php echo $SideNews[2];?></a></td>
      </tr>
    </table>
    </div>
<?php
}
?>
    
    </div>
  </div>