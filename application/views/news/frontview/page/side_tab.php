<!--use for side tab start-->
	<link rel="stylesheet" href="<?= base_url('sidetab/base/jquery.ui.all.css');?>">
	<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>
<!--use for side tab end-->

<div id="tabs" style="position:relative; bottom:16px;">
	<ul>
		<li><a href="#tabs-1">সর্বশেষ খবর</a></li>
		<li><a href="#tabs-2">সর্বাধিক পঠিত</a></li>
		<li><a href="#tabs-3">শীর্ষ খবর</a></li>
	</ul>
	<div id="tabs-1" class="col-md-6" style="height:300px;width:320px;border:1px solid #ccc;font:14px/26px Georgia, Garamond, Serif;overflow:auto;">
    <?php
		$query = $this->db->query("SELECT * FROM kha_news_info ORDER BY news_id DESC LIMIT 20");
	    $query1 = $query->result();
		foreach($query1 as $news){ ?>
    
        <li style="border-bottom: 1px solid #008282; margin-left:5px;"><img src="images/arrow.jpg" width="8px"/>
	        <a href="<?php echo 'news_details.php?ID='.$news->news_id;?>" style="margin-left:3px;">	<font color="#000000" style="font-size:16px;"><?php echo $news->news_headline;?></font>
			</a>
		</li>
    <?php } ?>  
	</div>
    
	<div id="tabs-2" class="col-md-6" style="height:300px;width:320px;border:1px solid #ccc;font:14px/26px Georgia, Garamond, Serif;overflow:auto;">
    <?php
	$query2 = $this->db->query("SELECT * FROM kha_news_info ORDER BY news_read_count DESC LIMIT 10");
	$query3 = $query2->result();
	foreach($query3 as $news2){ ?>
    
        <li style="border-bottom: 1px solid #008282; margin-left:5px;"><img src="images/arrow.jpg" width="8px"/><a href="<?php echo 'news_details.php?ID='.$news2->news_id;?>" style="margin-left:3px;"><font color="#000000" style="font-size:16px;"> <?php echo $news2->news_headline;?></font></a></li>
    <?php } ?>  
	</div>
    
	<div id="tabs-3" class="col-md-6" style="height:300px;width:320px;border:1px solid #ccc;font:14px/26px Georgia, Garamond, Serif;overflow:auto;">
	<?php
		$total=1;
		$query4 = $this->db->query("SELECT * FROM kha_news_info WHERE news_top_page_status='Yes' ORDER BY news_id DESC LIMIT 0,10");
		$query5 = $query4->result();
		foreach($query5 as $news3){ ?>

		<li style="border-bottom: 1px solid #008282; margin-left:5px;"><img src="images/arrow.jpg" width="8px"/><a href="<?php echo 'news_details.php?ID='.$news3->news_id;?>" style="margin-left:3px;"><font color="#000000" style="font-size:16px;"> <?php echo $news3->news_headline;?></font></a></li>
	<?php } ?>
	</div>
</div>