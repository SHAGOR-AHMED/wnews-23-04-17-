<link href="<?= base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />

<div class="col-md-8" style="margin-left:180px; margin-top:20px;">
<div class="box">
      <div class="box-header">
        <h3 class="box-title">Gallery Information</h3>
        <?php 
            $msg = $this->session->userdata('message');
            if($msg){
                echo $msg;
                $this->session->unset_userdata('message');
            }
		    ?>
        <a href="<?= base_url('backend/add_gallery');?>">
          <input name="sub" type="button" class="btn btn-success btn-sm" value="Add New Record" />
        </a>
      </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
            	<tr>
		            <td>Gallery ID</td>
		            <td>Gallery Title</td>
		            <td>Photo</td>
		            <td>Action</td>
		        </tr>
            	<?php foreach($gallery_info as $gallery){ ?>
            		<tr>
                  		<td><?php echo $gallery->gallery_id; ?></td>
                  		<td><?php echo $gallery->gallery_title; ?></td>
						<td>
							<img src="<?= base_url('img/gallery').'/'.$gallery->img_name; ?>" height="100" width="100" />
						</td>
                        <td>
			                <a href="<?= base_url();?>backend/edit_gallery_info/<?php echo $gallery->gallery_id; ?>">
			                  <input name="galEdit" type="submit" class="btn btn-info btn-sm" value="Edit"/>
			                </a>

			                <a href="<?= base_url();?>backend/delete_gallery_info/<?php echo $gallery->gallery_id; ?>">
			                  <input name="gallerydelete" type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return(confirm('Are You Sure?'));" />
			                </a>
			            </td>
	                </tr>

            	<?php } ?>
            </table>
      </div><!-- /.box-body -->
    </div>
</div>