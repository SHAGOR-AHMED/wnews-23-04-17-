<?php
  $query = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-002' ORDER BY news_id DESC LIMIT 5");
  $JatioImage = $query->row();
  //echo $JatioImage->news_id.'.jpg';exit;
?>
    <div class="post" style="margin-top: -10px;">
      <div style=" padding: 5px; background:green;color:font-weight:bold; font-size: 18px; color: #fff;">জাতীয়</div>
    <div class="thumb"><img src="<?= base_url('images/news/'.$JatioImage->news_id.'.jpg');?>" alt="" /></a></div>

<?php

  $query2 = $this->db->query("SELECT * FROM kha_news_info WHERE  news_cat_id='NCATID-002' ORDER BY news_id DESC LIMIT 5");

  $Jationews = $query->result();

  foreach($Jationews as $jatio){ ?>

    <div style="border-bottom: 1px solid #008282; "><img src="<?= base_url('images/arrow.jpg');?>" width="8px" height="8px" alt="" style="margin-top:4px;" />
      <a href="<?= base_url('frontend/news_details/'.$jatio->news_id);?>">
        <font color="#000000"> <?php echo $jatio->news_headline; ?></font>
      </a>
    </div>

  <?php } ?>

</div>

<!-------------------------Rajnitinews ------------------------>

<?php
  $query = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-003' ORDER BY news_id DESC LIMIT 5");
  $RajnitiImage = $query->row();
?>
  <div class="post" style="margin-top: -10px;">
    <div style=" padding: 5px; background:green;color:font-weight:bold; font-size: 18px; color: #fff;">রাজনীতি
    </div>
    <div class="thumb">
    <img src="<?= base_url('images/news/'.$RajnitiImage->news_id.'.jpg');?>" alt="" /></a> </div>

<?php
  $query2 = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-003' ORDER BY news_id DESC LIMIT 5");

  $Rajnitinews = $query->result();

  foreach($Rajnitinews as $rajniti){ ?>

    <div style="border-bottom: 1px solid #008282; "><img src="<?= base_url('images/arrow.jpg');?>" width="8px" height="8px" alt="" style="margin-top:4px;" />
      <a href="<?= base_url('frontend/news_details/'.$rajniti->news_id);?>">
        <font color="#000000"> <?php echo $rajniti->news_headline; ?></font>
      </a>
    </div>

<?php } ?>
</div>

<!------------------------Rajnitinews End ------------------------->

<!-------------------------BideshNews------------------------>

<?php
  $query = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-004' ORDER BY news_id DESC LIMIT 5");
  $BideshImage = $query->row();
?>
  <div class="post" style="margin-top: -10px;">
    <div style=" padding: 5px; background:green;color:font-weight:bold; font-size: 18px; color: #fff;">অর্থ ও বাণিজ্য
    </div>
    <div class="thumb">
    <img src="<?= base_url('images/news/'.$BideshImage->news_id.'.jpg');?>" alt="" /></a> </div>

<?php
  $query2 = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-004' ORDER BY news_id DESC LIMIT 5");

  $BideshNews = $query->result();

  foreach($BideshNews as $bidesh){ ?>

    <div style="border-bottom: 1px solid #008282; "><img src="<?= base_url('images/arrow.jpg');?>" width="8px" height="8px" alt="" style="margin-top:4px;" />
      <a href="<?= base_url('frontend/news_details/'.$bidesh->news_id);?>">
        <font color="#000000"> <?php echo $bidesh->news_headline; ?></font>
      </a>
    </div>

<?php } ?>
</div>
<!------------------------ BideshNews End ------------------------->

<!-------------------------KhelaNews------------------------>

<?php
  $query = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-005' ORDER BY news_id DESC LIMIT 5");
  $KhalaImage = $query->row();
?>
  <div class="post" style="margin-top: -10px;">
    <div style=" padding: 5px; background:green;color:font-weight:bold; font-size: 18px; color: #fff;">খেলাধুলা
    </div>
    <div class="thumb">
    <img src="<?= base_url('images/news/'.$KhalaImage->news_id.'.jpg');?>" alt="" /></a> </div>

<?php
  $query2 = $this->db->query("SELECT * FROM kha_news_info WHERE  news_cat_id='NCATID-005' ORDER BY news_id DESC LIMIT 5");

  $KhelaNews = $query->result();

  foreach($KhelaNews as $khela){ ?>

    <div style="border-bottom: 1px solid #008282; "><img src="<?= base_url('images/arrow.jpg');?>" width="8px" height="8px" alt="" style="margin-top:4px;" />
      <a href="<?= base_url('frontend/news_details/'.$khela->news_id);?>">
        <font color="#000000"> <?php echo $khela->news_headline; ?></font>
      </a>
    </div>

<?php } ?>
</div>
<!------------------------ KhelaNews End ------------------------->

<!-------------------------InternationalNews------------------------>

<?php
  $query = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-008' ORDER BY news_id DESC LIMIT 5");
  $ChitaImage = $query->row();
?>
  <div class="post" style="margin-top: -10px;">
    <div style=" padding: 5px; background:green;color:font-weight:bold; font-size: 18px; color: #fff;">আন্তর্জাতিক
    </div>
    <div class="thumb">
    <img src="<?= base_url('images/news/'.$ChitaImage->news_id.'.jpg');?>" alt="" /></a> </div>

<?php
  $query2 = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-008' ORDER BY news_id DESC LIMIT 5");

  $ChitaNews = $query->result();

  foreach($ChitaNews as $cheta){ ?>

    <div style="border-bottom: 1px solid #008282; "><img src="<?= base_url('images/arrow.jpg');?>" width="8px" height="8px" alt="" style="margin-top:4px;" />
      <a href="<?= base_url('frontend/news_details/'.$cheta->news_id);?>">
        <font color="#000000"> <?php echo $cheta->news_headline; ?></font>
      </a>
    </div>

<?php } ?>
</div>
<!------------------------ InternationalNews End ------------------------->

<!-------------------------Binodon------------------------>

<?php
  $query = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-010' ORDER BY news_id DESC LIMIT 5");
  $BinodonImage = $query->row();
?>
  <div class="post" style="margin-top: -10px;">
    <div style=" padding: 5px; background:green;color:font-weight:bold; font-size: 18px; color: #fff;">বিনোদন
    </div>
    <div class="thumb">
    <img src="<?= base_url('images/news/'.$BinodonImage->news_id.'.jpg');?>" alt="" /></a> </div>

<?php
  $query2 = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-010' ORDER BY news_id DESC LIMIT 5");

  $BinodonHeadLine = $query->result();

  foreach($BinodonHeadLine as $binodon){ ?>

    <div style="border-bottom: 1px solid #008282; "><img src="<?= base_url('images/arrow.jpg');?>" width="8px" height="8px" alt="" style="margin-top:4px;" />
      <a href="<?= base_url('frontend/news_details/'.$binodon->news_id);?>">
        <font color="#000000"> <?php echo $binodon->news_headline; ?></font>
      </a>
    </div>

<?php } ?>
</div>
<!------------------------ Binodon End ------------------------->

<!-------------------------Shikkha------------------------>

<?php
  $query = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-009' ORDER BY news_id DESC LIMIT 5");
  $ShikkhaImage = $query->row();
?>
  <div class="post" style="margin-top: -10px;">
    <div style=" padding: 5px; background:green;color:font-weight:bold; font-size: 18px; color: #fff;">শিক্ষাঙ্গন
    </div>
    <div class="thumb">
    <img src="<?= base_url('images/news/'.$ShikkhaImage->news_id.'.jpg');?>" alt="" /></a> </div>

<?php
  $query2 = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-019' ORDER BY news_id DESC LIMIT 5");

  $ShikkhaHeadLine = $query->result();

  foreach($ShikkhaHeadLine as $shikkha){ ?>

    <div style="border-bottom: 1px solid #008282; "><img src="<?= base_url('images/arrow.jpg');?>" width="8px" height="8px" alt="" style="margin-top:4px;" />
      <a href="<?= base_url('frontend/news_details/'.$shikkha->news_id);?>">
        <font color="#000000"> <?php echo $shikkha->news_headline; ?></font>
      </a>
    </div>

<?php } ?>
</div>
<!------------------------ Shikkha End ------------------------->

<!-------------------------Biggan------------------------>

<?php
  $query = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-049' ORDER BY news_id DESC LIMIT 5");
  $BigganImage = $query->row();
?>
  <div class="post" style="margin-top: -10px;">
    <div style=" padding: 5px; background:green;color:font-weight:bold; font-size: 18px; color: #fff;">বিজ্ঞান ও প্রযুক্তি
    </div>
    <div class="thumb">
    <img src="<?= base_url('images/news/'.$BigganImage->news_id.'.jpg');?>" alt="" /></a> </div>

<?php
  $query2 = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-018' ORDER BY news_id DESC LIMIT 5");

  $BigganHeadLine = $query->result();

  foreach($BigganHeadLine as $biggan){ ?>

    <div style="border-bottom: 1px solid #008282; "><img src="<?= base_url('images/arrow.jpg');?>" width="8px" height="8px" alt="" style="margin-top:4px;" />
      <a href="<?= base_url('frontend/news_details/'.$biggan->news_id);?>">
        <font color="#000000"> <?php echo $biggan->news_headline; ?></font>
      </a>
    </div>

<?php } ?>
</div>
<!------------------------ Biggan End ------------------------->

<!------------------------- Sasto ------------------------>

<?php
  $query = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-028' ORDER BY news_id DESC");
  $SastoImage = $query->row();
?>
  <div class="post" style="margin-top: -10px;">
    <div style=" padding: 5px; background:green;color:font-weight:bold; font-size: 18px; color: #fff;">স্বাস্থ্য
    </div>
    <div class="thumb">
    <img src="<?= base_url('images/news/'.$SastoImage->news_id.'.jpg');?>" alt="" /></a> </div>

<?php
  $query2 = $this->db->query("SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-026' ORDER BY news_id DESC LIMIT 5");

  $SastoHeadLine = $query->result();

  foreach($SastoHeadLine as $sasto){ ?>

    <div style="border-bottom: 1px solid #008282; "><img src="<?= base_url('images/arrow.jpg');?>" width="8px" height="8px" alt="" style="margin-top:4px;" />
      <a href="<?= base_url('frontend/news_details/'.$sasto->news_id);?>">
        <font color="#000000"> <?php echo $sasto->news_headline; ?></font>
      </a>
    </div>

<?php } ?>
</div>
<!------------------------ Sasto End ------------------------->