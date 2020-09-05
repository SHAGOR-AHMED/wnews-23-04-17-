<!-- <link rel="stylesheet" type="text/css" href="assets/css/style_slider.css" /> -->
<!-- <script type="text/javascript" src="assets/js/jquery-1.8.2.js" ></script> -->

<!-- <script type="text/javascript" src="assets/js/jquery-ui-tabs-rotate.js" ></script> -->

<?php
	// get latest 20 news
	$slideNews = mysql_query("SELECT * FROM kha_news_info WHERE news_status = '1' ORDER BY news_id DESC LIMIT 15");
?>

<style type="text/css">
	.carousel-caption a{
		color:white !important;
	}

	.carousel-caption h3{
		background: black;
		opacity: 0.7;
	}

	.carousel-caption h3:hover{
		opacity: 0.9;
		color: gray;
	}

	.item img{
		height: 300px !important;
		width: 99% !important;
	}

</style>

<!-- Top 5 News -->
<div class="row pr15">
    <div class="col-sm-7 sp-top-left-column">
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">
		      
		    <?php
		    	$si = 0;
		    	while($slideRow = mysql_fetch_array($slideNews)):
		    		$si++;
		    	if($si == 1):
		    		$class = "item active";
		    	else:
		    		$class = 'item';
		    	endif;
		    ?>

		      <div class="<?php echo $class ?>">
		        <img src="assets/images/news/<?php echo $slideRow['news_id'] ?>.jpg" alt="<?php echo $slideRow['news_headline'] ?>" class="img-responsive" height="100%" width="100%" >
		        <div class="carousel-caption">
		        	<a href="news_details.php?ID=<?php echo $slideRow['news_id'] ?>&title=<?= urlencode($slideRow['news_headline']) ?>">
		        		<h3 style="position: relative; top:50px; text-align:center;">
		        			<?php echo $slideRow['news_headline'] ?>
		        		</h3>
		        	</a>
		        </div>
		      </div>

		      <?php
		      	endwhile;
		      ?>

		    </div>

		    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="icon-prev" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="icon-next" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>

		</div>
	</div>


<?php
	
	$sql = "SELECT * FROM kha_news_info WHERE news_status = '1' ORDER BY news_id DESC LIMIT 20";
	$query = mysql_query($sql);

?>

		<div class="col-sm-5 sp-top-right-column">
            <div class="row">
                <div class="col-sm-12"  id="latest_news">
					
					<ul class="nav nav-tabs" role="tablist">
                    	<li role="presentation" style="background:green;"><a href="#latest" aria-controls="latest" role="tab" data-toggle="tab">সর্বশেষ</a></li>
                    </ul>

                    <div class="tab-content">
                    	<div role="tabpanel" class="tab-pane active" id="latest">
							<ul>
								<?php
									function dateDifference( $date_1 , $date_2 )
									{
									    $seconds = strtotime($date_2) - strtotime($date_1);

										$days    = floor($seconds / 86400);
										$hours   = floor(($seconds - ($days * 86400)) / 3600);
										$minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
										$seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));
									    // return $days;

									    if($days >= 0):
									    	return $hours." hours ".$minutes." minutes ".$seconds." second ago";
									    else:
									    	return $minutes." minutes ".$seconds." second ago";
									    endif;
									    // return $interval->format($differenceFormat);
									    
									}

									while($slidenews = mysql_fetch_array($query)):
								?>
								<li>
									<!-- <div class="col-md-12"> -->
										<!-- <span class="col-md-4"> -->
											<img src="assets/images/news/<?= $slidenews[0] ?>.jpg" height="50" width="50" style="float:left;" />
										<!-- </span> -->
										<p style="margin-left:55px !important;">
											<a href="news_details.php?ID=<?php echo $slidenews['news_id'] ?>&title=<?= urlencode($slidenews['news_headline']) ?>" title=" <?= $slidenews['news_headline'] ?>">
											<?php 
												echo $slidenews['news_headline'];
											?>
											</a><br/>
											<span style="font-size:12px;color:#95a5a6;">
											<?php
												echo dateDifference( $slidenews['news_date'],date('Y-m-d h:i:s') );
											?>

										</span>
										</p>
										
									<!-- </div> -->

									<!-- <a href="news_details.php?ID=<?php //echo $slidenews['news_id'] ?>" title=" বিশ্ব রেকর্ড গড়লেন হাঙ্গেরির ‘জলকন্যা’">
										
									</a> -->
								</li>

								<?php
									endwhile;
								?>

							</ul>
						</div>
					</div>

				</div>
            </div>
        </div>

    </div>
			<!-- Top 5 News -->

			<script type="text/javascript">
	$(document).ready(function(){
		$("#featured").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
	});
</script>