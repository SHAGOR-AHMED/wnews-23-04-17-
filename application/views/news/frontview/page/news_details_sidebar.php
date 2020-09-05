<div id="sidebar">
	<div style="position:relative; top:6px;" id="page_sidebar">
		<!-- Add 8 Start -->
			<?php
				$query = $this->db->query('SELECT * FROM kha_ads_info WHERE ads_position=6');
				$query1 = $query->row();
			?>
			<div style=" width:326px; height:200px; position:relative; left:8px; float:left; clear:right; border:1px solid black; margin-bottom:10px; ">
				<a href="#" target="blank"><img src="<?= base_url('adsimage/'.$query1->img_name);?>" alt=""
				style=" width:326px; height:200px; position:relative; float:left;"  /></a>
			</div>
		<!-- Add 8 End --> 
		 
	   <div ><h1>Related News</h1></div><hr>
		<?php
			$query = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='$news_details_info->news_cat_id'");
			$query2 = $query->result();
		?>
			<table width="275" border="0" align="left">
				<?php foreach($query2 as $qr){ ?>
					<div> 
					  <tr>
						<td width="104"><img src="<?= base_url('images/news/'.$qr->news_id.'.jpg');?>" alt="" height="80px" width="120px" /></td>
						<td width="141"><a href="#"><?php echo $qr->news_headline;?></a></td>
					  </tr>
					</div>
			</table>
		<?php } ?>
    </div>
</div>