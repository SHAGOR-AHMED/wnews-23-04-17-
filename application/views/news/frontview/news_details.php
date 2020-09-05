<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>worldnews365</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css');?>" />
<link rel="stylesheet" type="text/css" href="<?= base_url('slider/style.css?version=new');?>" />
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
    <div class="single">
      <h1 style="color:#073300;"><?php echo $news_details_info->news_headline;?></h1>
      <div style="float:left;">
      <p>Published: <?php echo $news_details_info->news_date;?></p></div> 

    <!-- AddThis Button BEGIN --> 
      <!-- <div style="float:right" class="addthis_toolbox addthis_default_style"> 
      <a class="addthis_button_preferred_1"></a> <a class="addthis_button_preferred_2"></a> 
      <a class="addthis_button_preferred_3"></a> <a class="addthis_button_preferred_4"></a> 
      <a class="addthis_button_compact"></a> <a class="addthis_counter addthis_bubble_style"></a> 
      </div>  -->
    <!-- AddThis Button END -->

	  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f6e2c8770b33edd"></script>
    
      <p><img class="alignright" src="<?= base_url('images/news/'.$news_details_info->news_id.'.jpg');?>" width="600" height="350" alt="News Image" /></p>
      <p>&nbsp;</p>
      <span style="text-align:justify;"><br /><?php echo $news_details_info->news_details;?></span>
	  
	  <<!-- AddThis Button END -->
	  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f6e2c8770b33edd"></script>
	  
    </div>
    <!-- end post -->
    <!--facebook comment -->
    <br />
    <form id="form1" name="form1" method="post" action="">
      <table width="662" border="0">
        <tr>
          <td height="37" colspan="2">Comments (0)</td>
        </tr>
        <tr>
          <td colspan="2" style="border-top: 3px solid #000;">&nbsp;</td>
        </tr>

        <tr>
          <td height="37" colspan="2" >&nbsp;</td>
        </tr>
        <tr>
          <td height="37" colspan="2" style="border-bottom: 1px solid #000;border-top: 3px solid #000;"><h3 id="reply-title">Leave a Comment</h3></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><label for="txtComment"></label>
          <textarea style="margin-left:10px;" name="txtComment" id="txtComment" cols="80" rows="3" placeholder="Please Enter Your Comment Here.."></textarea></td>
        </tr>

        <tr>
          <td height="34">&nbsp;</td>
          <td align="left"><input  type="submit" name="butPostComment" id="butPostComment" value="Post Comment" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
        </tr>
      </table>
    </form>
    <!--facebook comment -->
    
  </div>
  <!-- END content -->
  <!-- BEGIN sidebar -->
  <?php require_once('page/news_details_sidebar.php');?>
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