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
        <h3 class="box-title">|| Total ADs || </h3>
        <?php 
            $msg = $this->session->userdata('message');
            if($msg){
                echo $msg;
                $this->session->unset_userdata('message');
            }
    	?>
        <div></div>
      </div>
    <!-- /.box-header -->

		<div class="row">
			<div class="col-xs-11">
				<table class="table">
					<tr>
						<td> ID </td>
						<td> Site Link </td>
						<td> Image </td>
						<td> Action  </td>
					</tr>
					<?php foreach($ads_info as $ads){ ?>
						<tr>
							<td> <?php echo $ads->id; ?> </td>
							<td> <?php echo $ads->site_link; ?> </td>					
							<td><img src="<?= base_url('adsimage').'/'.$ads->img_name; ?>" alt="No Photo Found" class="img-rounded" width="150px" height="100px" />
							</td>									
							<td> 
								<span>
									<a class="btn btn-info" href="<?= base_url();?>backend/edit_ads/<?= $ads->id; ?>" title="click for edit"><span class="glyphicon glyphicon-edit"></span> Edit </a> 
								</span>
							</td>					
						</tr>

					<?php } ?>
				</table>
			<div>	
		</div>
      <!-- /.box-body --> 
    </div>
  </div>
</div>