<div id="featured" >
<ul class="ui-tabs-nav">
	<?php
		$total=1;
		$query = $this->db->query("SELECT * FROM kha_news_info WHERE news_top_page_status='Yes' ORDER BY news_id DESC LIMIT 0,4");
        $query1 = $query->result();

		foreach($query1 as $qr){
			$total++;
	?>
		<li class="ui-tabs-nav-item" id="nav-fragment-<?php echo $total;?>">
			<img src="<?= base_url('images/news/'.$qr->news_id.'.jpg');?>" alt="" style="width:100px; height:60px;" /><span style="font-size: 10px !important;"><?php echo $qr->news_headline;?></span>
		</li>

	<?php } ?>

</ul>
		  
	<?php
		$total=1;
		$query2 = $this->db->query("SELECT * FROM kha_news_info WHERE news_top_page_status='Yes' ORDER BY news_id DESC LIMIT 0,4");
        $query3 = $query->result();

		foreach($query3 as $qr3){
			$total++;
	?>
		<!-- First Content -->
		<div id="fragment-<?php echo $total;?>" class="ui-tabs-panel">
			<a href="<?php echo 'news_details.php?ID='.$qr3->news_id;?>" ><img src="<?= base_url('images/news/'.$qr3->news_id.'.jpg');?>" height="300px" width="556px" style="position: unset;" />
			</a>
			
			 <div class="info" >
				<h2><a href="<?php echo 'news_details.php?ID='.$qr3->news_id;?>" ><?php echo $qr->news_headline;?></a></h2>
				<!-- <font style="font-size:16px;"><?php echo mb_substr($qr->news_details,0,80,"UTF-8");?><a href="<?php //echo 'news_details.php?ID='.$qr3->news_id;?>" >...&nbsp; বিস্তারিত</a></font> -->
			 </div>
		</div>
	<?php } ?>
</div>