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
		        <h3 class="box-title">Update || <a class="btn btn-default" href="#"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Back </a>
				</h3>
		    </div><!-- /.box-header -->  

			<form method="post" action="<?= base_url('backend/update_ads_info');?>" enctype="multipart/form-data" class="form-horizontal">

				<table class="table table-bordered table-responsive">
					<tr>
						<td><label class="control-label">Site Link</label></td>
						<td><input class="form-control" type="text" name="site_link" placeholder="Enter Site Link" value="<?= $ads_info->site_link; ?>" /></td>
						<input type="text" name="id" value="<?= $ads_info->id; ?>" />
					</tr>
					
					<tr>
						<td><label class="control-label">Image</label></td>
						<td>
							<p><img src="<?= base_url('adsimage').'/'.$ads_info->img_name; ?>" height="100" width="100" /></p>
							<input class="input-group" type="file" name="img_name" />
						</td>
					</tr>
					
					<tr>
						<td colspan="2">
							<button type="submit" name="sub" class="btn btn-default">
								<span class="glyphicon glyphicon-save"></span> &nbsp; Update
							</button>
						</td>
					</tr>
			    </table>
			</form><!-- /.box-body --> 
	    </div>
	</div>
</div>