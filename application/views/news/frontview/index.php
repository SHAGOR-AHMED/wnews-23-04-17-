<!DOCTYPE>
<html>
<head>
<title>worldnews365</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="www.newsbatayon.com,দৈনিক নিউজ বাতায়ন,newsbatayon, travel, newspaper bd, dailynewspaper,  newspaper, bangla news, bd newspaper, bangla newspaper, bangladesh newspaper, news paper, bengali newspaper, bangla news paper,bangladeshi newspaper,news paper bangladesh,daily news paper in bangladesh,daily newspapers of bangladesh,daily newspaper,Daily newspaper,Current News,current news,bengali daily newspaper,daily News, Prothom Alo, Portal, portal, Bangla, bangla, News, news, Bangladesh, bangladesh, Bangladeshi, bangladeshi, Bengali, Culture, Portal Site, Dhaka, textile, garments, micro credit, Bangladesh News, phone cards, business news, Free Advertisement, free Ad, free Ad on the net, buy-sell, buy & sell, buy and sell, Advertisement on the Net, Horoscope, horoscope, IT, ICT, Business, Health, health, Media, TV, Radio, Dhaka News, World News, National News, Bangladesh Media, Betar, Current News, Weather, weather, foreign exchange rate, Foreign Exchange Rate, Education, Foreign Education,Higher Education, Family, Relationship, Sports, sports, Bangladesh Sports, Bangladesh, Bangladesh Politics, Bangladesh Business" />		
	
	<link rel="icon" type="image/ico" href="<?= base_url('images/fav.png');?>" />
	<link href="<?= base_url('images/fav.png');?>" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css');?>" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	
	<link rel="stylesheet" type="text/css" href="<?= base_url('slider/style_slider.css');?>" />
	<script type="text/javascript" src="<?= base_url('slider/js/jquery-1.8.2.js');?>" ></script>
	<script type="text/javascript" src="<?= base_url('slider/js/jquery-ui-1.9.0.custom.min.js');?>" ></script>
	<script type="text/javascript" src="<?= base_url('slider/js/jquery-ui-tabs-rotate.js');?>" ></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#featured").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
		});
	</script>
	
</head>

<body id="top">

<!-- BEGIN wrapper -->
<div id="wrapper"> 
  <!-- BEGIN header -->
    <?php require_once('page/header.php');?>
<div id="block-menu">
    <?php require_once('page/menu.php');?>
</div>	
  <!-- END header --> 
  <div class="break"></div>
  <!-- BEGIN content -->
<div id="content"> 

    <!-- Slider Start -->
    <?php require_once('page/slider.php');?>
    <!-- Slider End --> 
	
<!-- Add 2 Start -->
    <?php
        $query = $this->db->query('SELECT * FROM kha_ads_info WHERE ads_position=2');
        $query1 = $query->row();
        //print_r($query1);exit();
    ?>
    <div style=" width:818px; height:119px; position:relative; left:2px; float:left; border:1px solid #000000;">
	<a href="<?php echo $query1->site_link;?>" target="blank">
        <img src="<?= base_url('adsimage/'.$query1->img_name);?>" alt="" 
	   style=" width:818px; height:119px; position:relative; float:left;" />
    </a>
	</div>
<!-- Add 2 End --> 

    <!-- begin post -->
    <?php include('page/body_upper.php');?>
    <!-- end post -->

    <!-- begin post navigation -->
    <div class="break"></div>

	<!-- Add 3 Start -->
    
    <?php
        $query = $this->db->query('SELECT * FROM kha_ads_info WHERE ads_position=3');
        $query1 = $query->row();
    ?>
    <div style=" width:818px; height:119px; position:relative; left:2px; float:left; border:1px solid #000000; display:block;">
	<img src="<?= base_url('adsimage/'.$query1->img_name);?>" alt="" 
       style=" width:818px; height:119px; position:relative; float:left;" />
	</div>
	
	<!-- Add 3 End --> 
	 <div class="break"></div>
	 
    <!-- Photo Gallery Start -->
        <?php //include('page/gallery.php');?>
    <!-- Photo Gallery End --> 

	<!--menu details start-->
        <?php require_once('page/menu_details.php');?>
    <!--menu details end-->

    <!-- Add 4 start -->
        <?php
            $query = $this->db->query('SELECT * FROM kha_ads_info WHERE ads_position=4');
            $query1 = $query->row();
        ?>
        <div style=" width:818px; height:119px; position:relative; left:2px; float:left; border:1px solid #000000; display:block;">
        <img src="<?= base_url('adsimage/'.$query1->img_name);?>" alt="" 
           style=" width:818px; height:119px; position:relative; float:left;" />
        </div>
    <!-- Add 4 End --> 
    
    <!-- end post navigation --> 
</div>
  <!-- END content --> 
  <!-- BEGIN sidebar -->
  <?php require_once('page/sidebar.php');?>
  <!-- END sidebar --> 

  <!-- BEGIN footer -->
  <?php require_once('page/footer.php');?>
  <p id="back-top"><a href="#top"><span></span></a> </p>
  <!-- END footer --> 

</div>

<!-- END wrapper -->
</body>
</html>

<!-- back to top button -->
<script>
$(document).ready(function(){
var height = $( document ).height(); // returns height of HTML document
var scroll = (height/100)*3;
//alert(scroll);
    // hide #back-top first
    $("#back-top").hide();

    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > scroll) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
});
</script>
<!-- back to top -->

<!-- menu fixing -->

<script>

$(document).scroll(function() {
    var y = $(document).scrollTop(),
        header = $("#block-menu");
    if(y >= 300)  {
        header.css({position: "fixed", "z-index" : "10000", "top" : "0", "left" : "77", "width":"1200px",});
    } else {
        header.css({position: "relative","top" : "0", "left" : "0","width":"1200px",});
    }
});

</script>
<!-- menu fixing -->