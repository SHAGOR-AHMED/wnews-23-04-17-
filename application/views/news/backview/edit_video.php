<link href="<?= base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />

<div class="col-md-8" style="margin-left:180px; margin-top:20px;">
	<div class="box">
	    <div class="box-header">
	        <h3 class="box-title">Videos Information</h3>
	    </div><!-- /.box-header -->
        <div class="box-body no-padding">
	        <form method="post" name="form1" action="<?= base_url('backend/update_video_info');?>" enctype="multipart/form-data">
	            <table class="table table-condensed">

	            	<tr>
	                    <td>&nbsp;</td>
	                    <td>Video Title</td>
	                    <td><label for="admin_user"></label>
	                  		<input type="text" name="video_title" value="<?php echo $video_info->video_title; ?>" />
	                  	</td>
	                </tr>

	                <tr>
	                    <td>&nbsp;</td>
	                    <td>Youtube ID</td>
	                    <td><label for="admin_user"></label>
	                  	<input type="text" name="youtube_id" value="<?php echo $video_info->youtube_id; ?>" /></td>
	                  	<input type="hidden" name="video_id" id="txtRec" value="<?php echo $video_info->video_id; ?>" />
	                </tr>

	                <tr>
		                <td>&nbsp;</td>
		                <td>&nbsp;</td>
		                <td><input name="sub" type="submit" class="btn btn-success btn-sm" value="Update Video" /></td>
		            </tr>
	            </table>
	        </form>
        </div><!-- /.box-body -->
	</div>
</div> 