<style>
	.com_social{
		float:right;
		clear:right;
		height:35px;
		width:270px;
		display:block;
		margin-right:10px;
		background: #000;
	}

	.com_social a{
	color:#fff;
	text-decoration: none;
	font-style:none;
	float: left;
	display: inline;
	width:35px;
	height:35px;
	margin-top: 10px;
	}
	
	.com_social a:hover{
		color:#F44336;
	}
</style>

<div id="header">

	<div>
		<div style="height:40px; width:1200px; background:#000; float:left; clear:right; color:#000000; font-size:18px;">
			<div style="height:30px; width:500px; float:left; position:relative; left:4px; top:10px;">
			<?php 
				// include("date/date_conv_bangla.php");
				// include("date/banglaDate.php");
				// include("date/time_conv_bangla.php");
		   ?>
			</div>
			
			<!-- <div style="height:30px; width:100px; float:left; position:relative; top:4px; ">
				<a href="fonts/SolaimanLipi_04_07_05.ttf" download><img src="<?= base_url('images/bangla_font.png');?>" /></a>
			</div> -->
				 
			 
			<div class="com_social">
				<a href="https://www.facebook.com/enews71/" target="_blank" title="facebook"><span class="fa fa-facebook"></span></a>

				<a href="https://twitter.com/" target="_blank" title="twitter"><span class="fa fa-twitter"></span></a>
				
				<a href="https://linkedin.com/" target="_blank" title="linkedin"><span class="fa fa-linkedin"></span></a>
				
				<a href="https://plus.google.com/" target="_blank" title="google plus"><span class="fa fa-google-plus"></span></a>
				
				<a href="https://www.youtube.com/channel/" title="youtube"><span class="fa fa-youtube"></span></a>
			</div>
		</div>
	   
		
		<div style="height:120px; width:1200px; background:#ffffff; float:left; clear:right;">
			<div>
				<a href="index.php"><img width="370px" height="120px" style=" position:relative; left:4px; float:left; clear:right;" src="<?= base_url('images/banner/2.png');?>" alt="" /></a>
			</div>

			<?php
			    $query = $this->db->query('SELECT * FROM kha_ads_info WHERE ads_position=1');
			    $query1 = $query->row();
			    //print_r($query1);exit();

			?>
				<div style=" width:820px; height:119px; position:relative; right:4px; float:right;">
					<a href="<?php //echo $adsShow1[2];?>" target="blank"> <img src="<?= base_url('adsimage/'.$query1->img_name);?>?>" alt=""
					style=" width:822px; height:120px; position:relative; float:right;"/></a>
				</div>
		
		<!-- Add 1 End --> 
		</div>
		
		<table style="height:33px; width:1200px; background:#ffffff; float:left; clear:right;">
		  <tr>
			<td></td>
			<td><img src="<?= base_url('images/skhabor.png');?>" height="30px" align="right" /></td>
			<td>&nbsp;</td>
			<td><marquee onMouseOut="this.start();" onMouseOver="this.stop();" scrollamount="1" scrolldelay="20" truespeed>
			<?php 
				$query = $this->db->query('SELECT * FROM tbl_top_news ORDER BY top_news_id DESC');
				$query1 = $query->result();
				foreach ($query1 as $qr) {
					
			?>
			  <img src="<?= base_url('images/fav.png');?>" alt="" width="15px" height="15px" style="position:relative; top:2px;"/>&nbsp;<font color="#000000"><?php echo $qr->top_news;?></font>
			  <?php } ?>
			  </marquee>
			</td>
			<td>&nbsp;</td>
		  </tr>
		</table>

	</div>