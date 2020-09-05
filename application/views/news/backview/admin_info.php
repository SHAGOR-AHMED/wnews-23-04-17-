<link href="<?= base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />

<div class="col-md-8" style="margin-left:180px; margin-top:20px;">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Admin User Information</h3>
			<a href="<?= base_url('backend/add_admin');?>">
          		<input name="sub" type="button" class="btn btn-success btn-sm" value="Add New Record" />
        	</a>
		</div><!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
            	<tr>
            		<td><b>User Type</b></td>
            		<td><b>User Name</b></td>
            		<td><b>Action</b></td>
            	</tr>
            	<?php foreach($admin_info as $admin){ ?>

                <tr>
                	<td><?php echo $admin->admin_type; ?></td>
					<td><?php echo $admin->admin_name; ?></td>
	                <td>
	                 	<a href="<?php echo base_url();?>backend/edit_admin/<?php echo $admin->admin_id?>">
	                 		<input name="btnEdit" type="submit" class="btn btn-info btn-sm" id="btnEdit" value="Edit" />
	                 	</a>

	                 	<a href="<?php echo base_url();?>backend/delete_admin/<?php echo $admin->admin_id?>">
	                 		<input name="btnDelete" type="submit" class="btn btn-danger btn-sm" id="btnDelete" value="Delete" onclick="return(confirm('Are You Sure?'));" />
	                 	</a>
	                </td>
                </tr>

            	<?php } ?>
                <tr>
                    <td colspan="3">
                    <?php 
	                    $msg = $this->session->userdata('message');
	                    if($msg){
	                        echo $msg;
	                        $this->session->unset_userdata('message');
	                    }
                	?>
                    <input type="hidden" name="admin_id" id="txtRec" value="<?php echo $admin->admin_id; ?>" /></td>
                </tr>
            </table>
        </div><!-- /.box-body -->
    </div>
</div>