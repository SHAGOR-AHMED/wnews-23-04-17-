<?php
	require_once ("connection/dbConnection.php");
?>

<!DOCTYPE>
<html>
<head>
<title>নিউজ বাতায়ন . কম</title>
<meta charset="UTF-8" />

<link rel="stylesheet" type="text/css" href="style.css" />

<link rel="icon" type="image/ico" href="images/fav.png" />
<link href="images/fav.png" rel="shortcut icon" type="image/x-icon" />

<!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="ie.css" /><![endif]-->
<link rel="stylesheet" type="text/css" href="slider/style.css?version=new" />
<script type="text/javascript" src="slider/js/jquery-1.8.2.js" ></script>
<script type="text/javascript" src="slider/js/jquery-ui-1.9.0.custom.min.js" ></script>
<script type="text/javascript" src="slider/js/jquery-ui-tabs-rotate.js" ></script>
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
<?php require_once('header.php');?>
<div id="block-menu">
    <?php require_once('menu.php');?>
</div>
  <!-- END header -->
  <!-- BEGIN content -->
  <div id="content">
<?php
	$total=1;
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='".$_GET["CATID"]."' ORDER BY news_id DESC LIMIT 0,1";
	$query=mysql_query($sql);
	$UpNews=mysql_fetch_row($query)
?>

<div style="width:auto;height:200px;" >
		  <ul >
		    <table width="100%" height="142" border="0">
		      <tr>
		        <td width="329" rowspan="3"><img src="images/news/<?php echo $UpNews[0];?>.jpg" alt="" width="329px" height="200px" /></td>
		        <td width="327" height="28" valign="top"><h3><?php echo $UpNews[2];?></h3></td>
	          </tr>
		      <tr>
		        <td valign="top"><?php echo mb_substr($UpNews[3],0,280,"UTF-8");?>
                <a class="read_more" href="<?php echo 'news_details.php?ID='.$UpNews[0];?>">..বিস্তারিত</a>
                </td>
	          </tr>
	        </table>
      </ul>
        
</div>
<?php
	$sql="SELECT * FROM kha_news_info WHERE news_cat_id='".$_GET["CATID"]."' ORDER BY news_id DESC LIMIT 1,9";
	$query=mysql_query($sql);
	while($news=mysql_fetch_row($query))
	{
?>
    <!-- begin post -->
    <div class="post" style="margin-top: 15px;">
      <div class="thumb"><a href="<?php echo 'news_details.php?ID='.$news[0];?>"><img src="images/news/<?php echo $news[0];?>.jpg" alt="" /></a></div>
      <div style="height: 80px;"><h3><a href="<?php echo 'news_details.php?ID='.$news[0];?>"><?php echo $news[2];?></a></h3></div>
       <div style="height: 20px;"><p class="date">আপডেট: <?php echo $news[4];?></p></div>
       <div style="height: 140px;"><p><?php echo mb_substr($news[3],0,180,"UTF-8");?>..</p></div>
      <a class="continue" href="<?php echo 'news_details.php?ID='.$news[0];?>">বিস্তারিত..</a> </div>
    <!-- end post -->
<?php
}
?>
    
    <!-- begin post navigation -->
    <div class="postnav">
      <ul>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">&raquo;</a></li>
      </ul>
      <div class="break"></div>
    </div>
    <!-- end post navigation -->
  </div>
  <!-- END content -->
  <!-- BEGIN sidebar -->
<?php require_once('pages_sidebar.php');?>
  <!-- END sidebar -->
  <!-- BEGIN footer -->
  <?php require_once('footer.php');?>
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