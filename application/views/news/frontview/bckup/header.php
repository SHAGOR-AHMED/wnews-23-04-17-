<style>
	.com_social{
		float:right;
		clear:right;
		height:35px;
		width:270px;
		display:block;
		margin-right:10px;
	}
	.com_social ul li { 
		display:inline;
		height:40px;
		width:40px;
		margin-left:5px;
		display:block;
		float:left;  
	}

	.com_social ul li a
	{
	color:#CCCCCC;
	text-decoration: none;
	font-style:none;
	float: left;
	font-size:25px;
	display: inline;
	margin-left:10px;
	width:35px;
	height:35px;
	}

	.com_social ul li a.fb
	{
	/* color:#82c0f9; */
	/* color:#4A6EA9; */

	/* position:relative;
	top:3px; */
	background:url(social/icon_fb.png) no-repeat;
	width:35px;
	height:35px;
	}

	.com_social ul li a.tw
	{
	/* color:#55ACEE; */
	background:url(social/icon_tw.png) no-repeat;
	width:35px;
	height:35px;
	}

	.com_social ul li a.gp
	{
	background:url(social/icon_gp.png) no-repeat;
	width:35px;
	height:35px;
	}

	.com_social ul li a.yu
	{
	background:url(social/icon_yu.png) no-repeat;
	width:35px;
	height:35px;
	}
	
	.com_social ul li a.is
	{
	background:url(social/icon_is.png) no-repeat;
	width:35px;
	height:35px;
	}

	.com_social ul li a.in
	{
	background:url(social/ln.png) no-repeat;
	width:35px;
	height:35px;
	}
	
	.com_social ul li a:hover.fb
	{
	background:url(social/icon_fb_hover.png);
	width:40px;
	height:40px;
	}

	.com_social ul li a:hover.tw
	{
	/* color:#55ACEE; */
	background:url(social/icon_tw_hover.png);
	width:40px;
	height:40px;
	}

	.com_social ul li a:hover.gp
	{
	background:url(social/icon_gp_hover.png);
	width:40px;
	height:40px;
	}

	.com_social ul li a:hover.yu
	{
	background:url(social/icon_yu_hover.png);
	width:40px;
	height:40px;
	}
	
	.com_social ul li a:hover.is
	{
	background:url(social/icon_is_hover.png);
	width:40px;
	height:40px;
	}
	
	.com_social ul li a:hover.in
	{
	background:url(social/ln_hover.png);
	width:40px;
	height:40px;
	}
</style>



<?php
	require_once ("connection/dbConnection.php");
?>

<div id="header">

	<div>
		<div style="height:40px; width:1200px; background:#ffffff; float:left; clear:right; color:#000000; font-size:18px;">
			<div style="height:30px; width:500px; float:left; position:relative; left:4px; top:10px;">
				<?php 
					include("date/date_conv_bangla.php");
					include("date/banglaDate.php");
					include("date/time_conv_bangla.php");
			   ?>
			</div>
			
			<div style="height:30px; width:100px; float:left; position:relative; top:4px; ">
				<a href="fonts/SolaimanLipi_04_07_05.ttf" download><img src="images/bangla_font.png" /></a>
			</div>
				 
			 
			<div class="com_social">
				<ul>
					<li><a href="http://faceboo.com/" target="_blank" class="fb">  </a></li>
					<li><a href="https://twitter.com/" target="_blank" class="tw">  </a></li>
					<li><a href="https://plus.google.com/" target="_blank" class="gp">  </a></li>
					<li><a href="https://www.youtube.com/" target="_blank" class="yu">  </a></li>
					<li><a href="https://www.instagram.com/" target="_blank" class="is">  </a></li>
					<li><a href="https://www.linkedin.com/" target="_blank" class="in">  </a></li>
				</ul>
			</div>
		</div>
	   
		
		
		<div style="height:120px; width:1200px; background:#ffffff; float:left; clear:right;">
			<div>
				<a href="index.php"><img width="370px" height="120px" style=" position:relative; left:4px; float:left; clear:right;" src="images/banner/2.png" alt="" /></a>
			</div>
		
		<!-- Add 1 Start -->
		<?php
			$sql="SELECT * FROM kha_ads_info WHERE ads_position=1";
			$query=mysql_query($sql);
			$adsShow1=mysql_fetch_row($query);
		?>
			<div style=" width:820px; height:119px; position:relative; right:4px; float:right;">
			<a href="<?php echo $adsShow1[2];?>" target="blank"> <img src="adsimage/<?php echo $adsShow1[1];?>" alt=""
			style=" width:822px; height:120px; position:relative; float:right;"/></a>
			</div>
		
		<!-- Add 1 End --> 
		</div>
		
		<table style="height:33px; width:1200px; background:#ffffff; float:left; clear:right;">
		  <tr>
			<td></td>
			<td><img src="images/skhabor.png" height="30px" align="right" /></td>
			<td>&nbsp;</td>
			<td><marquee onMouseOut="this.start();" onMouseOver="this.stop();" scrollamount="1" scrolldelay="20" truespeed>
			<?php 
				$sql="SELECT * FROM kha_top_news_info ORDER BY top_news_id DESC LIMIT 5";
				$query=mysql_query($sql);
				while($TopNewsHeadline=mysql_fetch_row($query)){
			?>
			  <img src="images/fav.png" alt="" width="15px" height="15px" style="position:relative; top:2px;"/>&nbsp;<font color="#000000"><?php echo $TopNewsHeadline[1];?></font>
			  <?php } ?>
			  </marquee>
			</td>
			<td>&nbsp;</td>
		  </tr>
		</table>

	</div>