<link href="<?= base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />

<div class="col-md-8" style="margin-left:180px; margin-top:20px;">
<div class="box">
      <div class="box-header">
        <h3 class="box-title">Videos Information</h3>
        <a href="<?= base_url('backend/add_video');?>">
          <input name="sub" type="button" class="btn btn-success btn-sm" value="Add New Record" />
        </a>
      </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
            	<tr>
		            <td>Video ID</td>
		            <td>Youtube ID</td>
		            <td>Action</td>
		        </tr>
            	<?php foreach($video as $videos){ ?>
            		<tr>
                  		<td><?php echo $videos->video_id; ?></td>
                  		<td><?php echo $videos->video_title; ?></td>
                        <td><?php echo $videos->youtube_id; ?></td>
                        <td>
			                <a href="<?= base_url();?>backend/edit_video_info/<?php echo $videos->video_id; ?>">
			                  <input name="vdoEdit" type="submit" class="btn btn-info btn-sm" value="Edit"/>
			                </a>

			                <a href="<?= base_url();?>backend/delete_video_info/<?php echo $videos->video_id; ?>">
			                  <input name="vdoDelete" type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return(confirm('Are You Sure?'));" />
			                </a>
			            </td>

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
	                    <input type="hidden" name="video_id" id="txtRec" value="<?php echo $videos->video_id; ?>" /></td>
	                </tr>

            	<?php } ?>
            </table>
      </div><!-- /.box-body -->
    </div>
</div>