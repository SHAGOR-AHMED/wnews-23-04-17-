<?php
	require_once ("connection/dbConnection.php");
	require_once ("connection/spUtility.php");
	
	if(isset($_POST["butPostComment"]))
	{
		$sql="SELECT COUNT(*),visitor_id FROM kha_visitor_info WHERE visitor_email = '".$_POST["txtEmail"]."' AND visitor_pass ='".$_POST["txtPassword"]."'";
		$rs=mysql_query($sql);
		$r=mysql_fetch_row($rs);
		if($r[0] > 0)
		{
			$id=$CodeSystem->MakeID("PSTID-",14,'kha_visitor_details_info','vis_details_id');
			$sql="INSERT INTO kha_visitor_details_info(
												vis_details_id,
												vis_details_visitor_id,
												vis_details_news_id,
												vis_details_comment,
												vis_details_date,
												vis_details_status)
												VALUES(
												'".$id."',
												'".$r[1]."',
												'".$_GET["ID"]."',
												'".$_POST["txtComment"]."',
												'".$CodeSystem->SPDate()."',
												'1'
												)";
			$query=mysql_query($sql);
		}
		else
		{
			echo  "<script>alert('Please! Try later.')</script>";	
		}		
		
	}
	 
	 
	 
	 
	 $sql="SELECT news_read_count FROM kha_news_info WHERE news_id='".$_GET["ID"]."'";
	 $query=mysql_query($sql);
	 $count=mysql_fetch_row($query);
	 
	 $sql="UPDATE kha_news_info SET news_read_count='".++$count[0]."' WHERE news_id='".$_GET["ID"]."'";
	 $query=mysql_query($sql);
	 
	 $sql="SELECT * FROM kha_news_info WHERE news_id='".$_GET["ID"]."'";
	 $query=mysql_query($sql);
	 $fetch=mysql_fetch_object($query);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>worldnews365</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
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

<?php

if(isset($_GET['ID'])){
//echo $_GET['ID'];
//exit;
$main_news=mysql_query("SELECT * FROM kha_news_info WHERE news_id='".$_GET["ID"]."'");
$news0=mysql_fetch_row($main_news);
$short_desc=mb_substr($news0[3],0,220,"UTF-8");
/* print_r($short_desc);
exit(); */
$img=mysql_query("select news_id FROM kha_news_info WHERE news_id ='".$_GET["ID"]."'");
$news_img0=mysql_fetch_row($img);
//$short_desc=mb_substr($news_headline0,0,600,"UTF-8");
?>

<meta property="og:title" content="<?php echo "$news0[2]"; ?>"/>
<meta property="og:description" content="<?php echo "$short_desc"; ?>"/>
<meta property="og:image" content="images/news/<?php echo $news_img0[0].'.jpg';?>" />
<meta property="og:site_name" content="newsbatayon.com/" />
<meta property="og:type" content="article" />
<meta property="og:locale" content="en_US" />
<link rel="canonical" href="<?php echo "http://". $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
<meta property="og:url" content="<?php echo "http://". $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
<meta property="article:author" content="http://www.newsbatayon.com/" />
<meta property="article:publisher" content="http://www.newsbatayon.com/" />
<?php }

?>	

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
      <h1 style="color:#073300;"><?php echo $fetch->news_headline;?></h1>
      <div style="float:left;">
      <p>Published: <?php echo $fetch->news_date;?></p></div>  
      <!-- AddThis Button BEGIN --> 
      <div style="float:right" class="addthis_toolbox addthis_default_style"> 
      <a class="addthis_button_preferred_1"></a> <a class="addthis_button_preferred_2"></a> 
      <a class="addthis_button_preferred_3"></a> <a class="addthis_button_preferred_4"></a> 
      <a class="addthis_button_compact"></a> <a class="addthis_counter addthis_bubble_style"></a> 
      </div> 
	  
      <!-- AddThis Button END -->
	  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f6e2c8770b33edd"></script>
    
      <p><img class="alignright" src="images/news/<?php echo $fetch->news_id;?>.jpg" width="600" height="350" alt="News Image" /></p>
      <p>&nbsp;</p>
      <span style="text-align:justify;"><br /><?php echo $fetch->news_details;?></span>
	  
	  <<!-- AddThis Button END -->
	  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f6e2c8770b33edd"></script>
	  
    </div>
    <!-- end post -->
    <!--facebook comment -->
    <br />
    <form id="form1" name="form1" method="post" action="">
      <table width="662" border="0">
        <tr>
          <td colspan="2" style="border-top: 3px solid #000;">&nbsp;</td>
        </tr>
      
      <?php
	  $sql="SELECT
				kha_visitor_info.visitor_id
				, kha_visitor_info.visitor_name
				, kha_visitor_details_info.vis_details_id
				, kha_visitor_details_info.vis_details_news_id
				, kha_visitor_details_info.vis_details_comment
				, kha_visitor_details_info.vis_details_date
			FROM
				kha_visitor_info
				INNER JOIN kha_visitor_details_info 
					ON (kha_visitor_info.visitor_id = kha_visitor_details_info.vis_details_visitor_id) 
					WHERE kha_visitor_details_info.vis_details_news_id='".$_GET["ID"]."'";
		$query=mysql_query($sql);
		while($commentShow=mysql_fetch_row($query))
		{
      
	  ?>
        <tr>
          <td height="37" colspan="2">
          <table width="648" border="1">
              <tr>
                <td width="112" rowspan="2"><img class="alignright" src="images/member/<?php echo $commentShow[0];?>.jpg" width="104" height="103" alt="" /></td>
                <td width="526" height="29" ><?php echo $commentShow[5];?></td>
              </tr>
              <tr>
                <td height="87" align="left" valign="top"><?php echo $commentShow[4];?></td>
              </tr>
        </table>

          </td>
        </tr>
       <?php
		}
	   ?> 
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
          <td height="36">&nbsp;</td>
          <td>Please Login For Comments. Or <a href="member_info.php">Registration(Sign Up)</a></td>
        </tr>
        <tr>
          <td width="46" height="31">&nbsp;</td>
          <td width="606"><label for="txtEmail"></label>
          <input style="height:25px;" name="txtEmail" type="text" id="txtEmail" size="60" placeholder="Your Email" /></td>
        </tr>
        <tr>
          <td height="37">&nbsp;</td>
          <td><input style="height:25px;" name="txtPassword" type="text" id="txtPassword" size="60" placeholder="Your Password" /></td>
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