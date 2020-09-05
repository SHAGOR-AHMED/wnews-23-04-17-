<link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css');?>" />
<style type="text/css">
.btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 18px;
  padding: 6px 25px 6px 25px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
</style>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="sidebar">

    <div class="wrapper">
      <!-- begin popular posts -->
	<?php include("side_tab.php");?>      
	<!-- end popular posts -->
    
	<!-- Add 5 Start -->
    <?php
        $query = $this->db->query('SELECT * FROM kha_ads_info WHERE ads_position=5');
        $query1 = $query->row();
    ?>
    <div style=" width:326px; height:200px; position:relative; float:right; border:1px solid black; ">
    <a href="<?php echo $query1->site_link;?>" target="blank">
        <img src="<?= base_url('adsimage/'.$query1->img_name);?>" alt="" 
     style=" width:326px; height:200px; position:relative; float:right;" />
    </a>
  </div>
	<!-- Add 5 End --> 
	 
<!-- namaz time start -->
<div style="min-height:300px;width:326px; border:2px solid #ccc; position:relative; top:12px; font:16px/26px Georgia, Garamond, Serif;overflow:auto;">

<p><iframe src="http://us.mohid.co/il/swcs/ifsvp/masjid/widget/api/index/?m=prayertimings" frameborder="0" height="280" width="100%"></iframe></p>

<div id="title" style="width:326px; hight:20px; background:#A1D5EB; display:block;">
<center> Namaz Time Auto Updated</center></div>
</div>
<!-- namaz time end -->

<!-- Vote Start-->
<form method="post" name="form1" action="">        
<br /><div style="min-height:350px;width:326px;border:1px solid #ccc;font:20px Georgia, Garamond, Serif;overflow:auto;">
<?php

	// $sql="SELECT * FROM kha_vote_message_info ORDER BY vote_msg_id DESC";
	// $query=mysql_query($sql);
	// $fetch=mysql_fetch_row($query);
	
	// if(isset($_POST["Vote"]))
	// {
	// 	$sql="SELECT * FROM kha_vote_info WHERE vote_vote_msg_id='".$fetch[0]."'";
	// 	$query=mysql_query($sql);
	// 	$ipAddress=mysql_fetch_row($query);
	// 	if(!empty($_POST["RadioGroup"]))
	// 	{
	// 		//if($ipAddress[2]!=$_SERVER["REMOTE_ADDR"])
	// 		//{
	// 			$id=$CodeSystem->MakeID("VID-",20,"kha_vote_info","vote_id");
	// 			$sql="INSERT INTO kha_vote_info(vote_id,vote_vote_msg_id,vote_voter_ip,vote_vote_count,vote_date,vote_status)
	// 			VALUES
	// 			( '".$id."',
	// 			  '".$fetch[0]."',
	// 			  '".$_SERVER["REMOTE_ADDR"]."',
	// 			  '".$_POST["RadioGroup"]."',
	// 			  '".$CodeSystem->SPDate()."',
	// 			  '1'
	// 			)";	
	// 			$result=mysql_query($sql);
	// 			$MSG = $result?"Data added successfully..":"data added unsuccessfully..";
	// 		//}
	// 	}
		
	// }
	// $TotalVote=0;
	// $sql="SELECT COUNT(vote_id) AS total,vote_vote_count FROM kha_vote_info WHERE vote_vote_msg_id='".$fetch[0]."' GROUP BY vote_vote_count";
	// $query=mysql_query($sql);
	// while($AllVoteVote=mysql_fetch_row($query))
	// {
	//  	$TotalVote=$TotalVote+$AllVoteVote[0];
	// 	if($AllVoteVote[1]=='Yes')
	// 	{
	// 		$Yes=$AllVoteVote[0];
	// 	}
	// 	else if($AllVoteVote[1]=='No')
	// 	{
	// 	 	$No=$AllVoteVote[0];
	// 	}
	// 	else if($AllVoteVote[1]=='No Comment')
	// 	{
	// 		$NoComment=$AllVoteVote[0];
	// 	}
	// }
	// $TotalVote;
	// $Yes=($Yes*100)/$TotalVote;
	// $No=($No*100)/$TotalVote;
	// $NoComment=($NoComment*100)/$TotalVote;
  
?>


<table width="280">
  <tr>
    <td width="139" height="38"><img src="<?= base_url('images/vote.jpg'); ?>" width="326px" /></td>
    </tr>
  <tr>
    <td height="77" style="border-bottom: 1px solid #008282; margin-left:5px;"><h5><?php //echo $fetch[1];?></h5></td>
  </tr>
  <tr>
    <td height="40" style="border-bottom: 1px solid #008282; margin-left:5px;">ভোট দিয়েছেন <?php //echo BanglaNumber($TotalVote); ?> জন </td>
    </tr>
  <tr>
    <td height="40" style="border-bottom: 1px solid #008282; margin-left:5px;">হ্যাঁ-<?php //echo BanglaNumber(number_format($Yes)); ?>%  &nbsp; না-<?php //echo BanglaNumber(number_format($No)); ?>% &nbsp; মন্তব্য নেই-<?php //echo BanglaNumber(number_format($NoComment)); ?>%</td>
    </tr>
  <tr>
    <td height="40" style="border-bottom: 1px solid #008282; margin-left:5px;"><p>
      <label>
        <input type="radio" name="RadioGroup" value="Yes" id="RadioGroup" />
        হ্যাঁ</label>
      <label>
        <input type="radio" name="RadioGroup" value="No" id="RadioGroup" />
        না</label>
      <label>
        <input type="radio" name="RadioGroup" value="No Comment" id="RadioGroup" />
        মন্তব্য নেই</label>
      <br />
    </p></td>
    </tr>
  <tr>
    <td height="50"><input type="submit" name="Vote" id="button" value="ভোট দিন" />
    <input formaction="vote_archive.php" type="submit" name="Vote" id="button" value="পুরোনো ফলাফল" />
    </td>
    </tr>
</table>
</div>
</form>

<!-- Vote End -->

<div style="position:relative; top:16px; width:328px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto; ">
<?php
	// $sql="SELECT * FROM kha_news_info WHERE news_cat_id='NCATID-037' ORDER BY news_id DESC";
	// $query=mysql_query($sql);
	// $fetch=mysql_fetch_row($query);
?>


<table width="328">
<tr>
    <td  height="38" style="border-bottom: 3px solid #F00; "><font style="font-size:25px;margin-left:100px;">আমাদের পাঠক</font>
	</td>
</tr>
<tr>
    <td style="text-align:center;"><script type="text/javascript" src="http://counter5.fcs.ovh/private/counter.js?c=e5ce2c74e46ffefb47a0c4abfbc9cc6d"></script></font></td>
</tr>

  <tr>
    <td  height="38" style="border-top: 3px solid #F00; margin-left:5px;">
    <img src="<?= base_url('images/weather.jpg');?>" width="328px" /></td>
    </tr>
  <tr>
    <td height="80" style="border-bottom: 1px solid #F00; margin-left:5px;">
    <!-- <h5><?php echo $fetch[1];?></h5> -->
    <!-- weather widget start -->
    <div id="m-booked-weather-bl250-51234">
      <div class="booked-wzs-250-175-data wrz-01"> 
        <div class="booked-wzs-250-175-right"> 
          <div class="booked-wzs-day-deck">
            <div class="booked-wzs-day-val"> 
              <div class="booked-wzs-day-number"><span class="plus">+</span>28</div> 
                <div class="booked-wzs-day-dergee"> 
                  <div class="booked-wzs-day-dergee-val">&deg;</div> 
                    <div class="booked-wzs-day-dergee-name">C</div>
                </div>
            </div>
          <div class="booked-wzs-day">
            <div class="booked-wzs-day-d">H: <span class="plus">+</span>28&deg;</div> 
            <div class="booked-wzs-day-n">L: <span class="plus">+</span>16&deg;</div>
          </div> 
          </div> 
          <div class="booked-wzs-250-175-city">Dhaka</div> 
          <div class="booked-wzs-250-175-date">Tuesday, 12 January</div> 
          <div class="booked-wzs-left"> <span class="booked-wzs-bottom-l">See 7-Day Forecast</span> </div> 
        </div> 
      </div> 
      <table cellpadding="0" cellspacing="0" class="booked-wzs-table-250"> 
        <tr> <td>Wed</td> <td>Thu</td> <td>Fri</td> <td>Sat</td> <td>Sun</td> <td>Mon</td> </tr> 
        <tr> <td class="week-day-ico"><div class="wrz-sml wrzs-01"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-01"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-01"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-01"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> </tr> 
        <tr> <td class="week-day-val"><span class="plus">+</span>26&deg;</td> <td class="week-day-val"><span class="plus">+</span>24&deg;</td> <td class="week-day-val"><span class="plus">+</span>24&deg;</td> <td class="week-day-val"><span class="plus">+</span>23&deg;</td> <td class="week-day-val"><span class="plus">+</span>20&deg;</td> <td class="week-day-val"><span class="plus">+</span>23&deg;</td> </tr> 
        <tr> <td class="week-day-val"><span class="plus">+</span>13&deg;</td> <td class="week-day-val"><span class="plus">+</span>12&deg;</td> <td class="week-day-val"><span class="plus">+</span>11&deg;</td> <td class="week-day-val"><span class="plus">+</span>11&deg;</td> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> <td class="week-day-val"><span class="plus">+</span>14&deg;</td> </tr> 
      </table>
    </div>
      <script type="text/javascript"> 
      var css_file=document.createElement("link"); 
      css_file.setAttribute("rel","stylesheet"); 
      css_file.setAttribute("type","text/css"); 
      css_file.setAttribute("href",'//s.bookcdn.com/css/w/booked-wzs-widget-275.css?v=0.0.1'); 
      document.getElementsByTagName("head")[0].appendChild(css_file); 
      function setWidgetData(data) { 
        if(typeof(data) != 'undefined' && data.results.length > 0) { 
          for(var i = 0; i < data.results.length; ++i) { 
            var objMainBlock = document.getElementById('m-booked-weather-bl250-51234'); 
            if(objMainBlock !== null) { 
              var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); 
              objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); 
              } 
            } 
          } else { 
            alert('data=undefined||data.results is empty'); 
            } 
    } 
    </script>
    <script type="text/javascript" charset="UTF-8" src="http://widgets.booked.net/weather/info?action=get_weather_info&ver=4&cityID=w629221&type=3&scode=124&ltid=3458&domid=w209&cmetric=1&wlangID=1&color=082f59&wwidth=250&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0"></script>
    <!-- weather widget end -->

    </td>
  </tr>
  
</table>
</div>

  <!-- end flickr photos -->
  <!-- begin featured video -->
  
    <?php
      $qr = $this->db->query('SELECT * FROM tbl_video ORDER BY video_id DESC');
      $qr1 =$qr->result(); 
	  ?>
      
      <div class="video"> 
        <div style="float:left; min-height:200px; width:320px; margin-right:8px;">
          <a href="video_gallery.php"><div style="padding:4px 0;"><img src="<?= base_url('images/video.jpg');?>" width="328px" /></div></a>
          <iframe width="328" height="330" src="//www.youtube.com/embed/<?php echo $qr1->youtube_id;?>" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <!-- end featured video -->
 <div class="video">     
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'yy-mm-dd'
		});
	});
	</script>
    
<h1 style="background-color: #063; margin-top:380px;"><img src="<?= base_url('images/archive.jpg');?>" width="278px" /></h1>
 <form method="post" name="form1" action="archive.php">        
<div class="demo">
<div>&nbsp;</div>
<input type="text" name="datepicker" placeholder="  আর্কাইভ দেখতে ক্লিক করুন" id="datepicker" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px; border:1px solid #848484;outline:0; height:25px; width: 170px; ">
<input name="btDate" type="submit" class="btn" value="GO"/>
</div>
</form>

<!-- End demo -->
<div class="ads" >
<h1 style="background-color: #015021; margin-top:10px;"><font style="color:#FFF; margin-left:5px;">Facebook Page</font></h1>

<div class="fb-page" data-href="https://www.facebook.com/Gateway-Information-Technology-129171450627226/" data-width="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
<div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Gateway-Information-Technology-129171450627226/"><a href="https://www.facebook.com/Gateway-Information-Technology-129171450627226/">Gateway IT</a></blockquote>
</div>
</div>    
</div>
    
<!-- Add 6 Start -->
<?php
  $ads = $this->db->query('SELECT * FROM kha_ads_info WHERE ads_position=6');
  $adsimage = $ads->row();
?>
  <div style=" width:326px; height:200px; position:relative; float:right; border:1px solid black; ">
		<a href="<?php echo $adsimage->site_link;?>" target="blank">
      <img src="<?= base_url('adsimage/'.$adsimage->img_name);?>" alt=""
		style=" width:326px; height:200px; position:relative; float:right;clear: right;"  /></a>
	</div>
<!-- Add 6 End -->
      
   </div>   
      
    <!-- begin tags -->
      <div class="tags" style="text-align: center;"></div>
    <!-- end tags -->
    <!-- BEGIN left -->
      <div class="l sbar">
        <!-- begin categories -->
      </div>
    <!-- END left -->
      <!-- BEGIN right --><!-- END right -->
    </div>
  </div>