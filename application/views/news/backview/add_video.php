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
        <form method="post" name="form1" action="<?= base_url('backend/save_video');?>" enctype="multipart/form-data">
            <table class="table table-condensed">
                <tr>
                    <td>&nbsp;</td>
                    <td>Video Title</td>
                    <td><label for="admin_user"></label>
                	<input type="text" name="video_title" value="" /></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>Youtube ID</td>
                    <td><label for="admin_user"></label>
                	<input type="text" name="youtube_id" id="video_youtube_id" value="" /></td>
                </tr>
                <tr>
	                <td>&nbsp;</td>
	                <td><input name="sub" type="submit" class="btn btn-success btn-sm" value="Add Video" /></td>
	              </tr>
                <tr>
                    <td colspan="3">
                    	<?php 
				            $msg = $this->session->userdata('message');
				            if($msg){
				                echo $msg;
				                $this->session->unset_userdata('message');
				            }
			    		?>
                	</td>
                </tr>
            </table>
        </form>
      </div><!-- /.box-body -->
    </div>
</div>