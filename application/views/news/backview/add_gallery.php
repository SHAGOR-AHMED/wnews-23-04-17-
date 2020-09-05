<link href="<?= base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css');?>">
<link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap-theme.min.css');?>">

<div class="container">
	<div class="col-md-11" style="margin-left:50px; margin-top:20px;">
	    <div class="box">
		    <div class="box-header">
		        <h3 class="box-title">Gallery</h3>
		    </div><!-- /.box-header -->  

			<form method="post" action="<?= base_url('backend/save_gallery_info');?>" enctype="multipart/form-data" class="form-horizontal">

				<table class="table table-bordered table-responsive">
					<tr>
						<td><label class="control-label">Gallery Title</label></td>
						<td><input class="form-control" type="text" name="gallery_title" placeholder="Enter Gallery Title" value="" /></td>
					</tr>
					
					<tr>
						<td><label class="control-label">Image</label></td>
						<td>
							<input class="input-group" type="file" name="img_name" />
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
						</td>
	                </tr>
					
					<tr>
						<td colspan="2">
							<button type="submit" name="sub" class="btn btn-default">
								<span class="glyphicon glyphicon-save"></span> &nbsp; Save
							</button>
						</td>
					</tr>
			    </table>
			</form><!-- /.box-body --> 
	    </div>
	</div>
</div>