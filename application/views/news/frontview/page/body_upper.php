<?php
  $query = $this->db->query("SELECT * FROM kha_news_info WHERE news_top_page_status='Yes' ORDER BY news_id DESC LIMIT 4,6 ");
  $query1 = $query->result();
  foreach ($query1 as $qr) {
?>
  <div class="post" style="margin-top: -10px;">
      <div class="thumb"><a href="<?= base_url('frontend/news_details/'.$qr->news_id);?>">
      <img src="<?= base_url('images/news/'.$qr->news_id.'.jpg');?>" alt="" /></a>
      </div>

      <div style="height:65px;">
      <h3><a href="<?= base_url('frontend/news_details/'.$qr->news_id);?>"><?php echo $qr->news_headline;?></a></h3>
      </div>

      <div style="height:150px; "> 
        <?php //echo limit_words(strip_tags($qr->news_details,'<p><em><a><br/><b><strong>'),27);?>..
        <?php echo mb_substr($qr->news_details,0,60,"UTF-8");?>.....
      </div>
      <a class="continue" href="<?= base_url('frontend/news_details/'.$qr->news_id);?>">বিস্তারিত..</a> 
  </div>
<?php } ?>