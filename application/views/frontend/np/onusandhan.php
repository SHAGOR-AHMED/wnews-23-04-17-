<!DOCTYPE>
<html>
<head>
<title>worldnews365.org</title>
<meta charset="UTF-8" />

<link rel="stylesheet" type="text/css" href="<?= base_url('slider/style.css?version=new');?>" />
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
  <!-- BEGIN content -->
  <div id="content">
	<!-- begin post -->
	<div class="post" style="margin-top: 15px;">
		<p>Rent/To-let/A to Z</p>
		<form action="" method="post">
			<label>Search</label>
			<input type="text" name="search" value="" />
			<label>Organization</label>
			<input type="text" name="organization" value="" />
			<label>Location</label>
			<input type="text" name="location" value="" />
			<input type="submit" name="sub" value="submit" />
		</form>
	</div>
	<!-- end post -->
    
    <!-- begin post navigation -->
    <div class="postnav">
      <!--<ul>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">&raquo;</a></li>
      </ul>-->
      <div class="break"></div>
    </div>
    <!-- end post navigation -->
  </div>
  <!-- END content -->
  <!-- BEGIN sidebar -->
<?php //require_once('page/pages_sidebar.php');?>
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