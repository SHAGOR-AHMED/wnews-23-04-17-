<form method="post" name="form1" action="<?= base_url('backend/add_admin');?>" enctype="multipart/form-data">

	<link href="<?= base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />

	<div class="col-md-8" style="margin-left:180px; margin-top:20px;">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Admin User Information</h3>
			</div><!-- /.box-header -->
	        <div class="box-body no-padding">
	            <table class="table table-condensed">
	            	<?php foreach($admin_info as $admin){ ?>

	            	<!-- <tr>
	                    <td>&nbsp;</td>
	                    <td>Admin ID</td>
	                    <td><label for="admin_id"></label>
	                  <input name="admin_id" type="text" value="<?php echo $admin->admin_id; ?>" /></td>
	                </tr> -->
	                <tr>
	                  <td>&nbsp;</td>
	                  <td>User Type</td>
	                  <td><label for="select"></label>
	                    <select name="admin_type" id="select">
	                      <option value="Admin">Admin</option>
	                      <!--<option value="Sub Admin">Sub Admin</option>-->
	                  </select></td>
	                </tr>
	                <tr>
	                    <td>&nbsp;</td>
	                    <td>User Name</td>
	                    <td><label for="admin_name"></label>
	                  <input type="text" name="admin_name" id="admin_name" value="<?php echo $admin->admin_name; ?>" /></td>
	                </tr>
	                <!-- <tr>
	                    <td>&nbsp;</td>
	                    <td>User Password</td>
	                    <td><label for="admin_password"></label>
	                  <input type="password" name="admin_password" id="admin_password" value="<?php echo $admin->admin_pass; ?>" /></td>
	                </tr> -->

	                <tr>
	                    <td>&nbsp;</td>
	                    <td>Status</td>
	                    <td><label for="admin_status"></label>
	                  <input type="text" name="admin_status" id="admin_status" value="<?php echo $admin->admin_status; ?>" /></td>
	                </tr>

	                <tr>
		                <td colspan="2" align="center">

		                 	<input name="submit" type="submit" class="btn btn-success btn-sm" id="btnAdd" value="Add" />

		                 	<a href="<?php echo base_url();?>backend/edit_admin/<?php echo $admin->admin_id?>">
		                 		<input name="btnEdit" type="submit" class="btn btn-info btn-sm" id="btnEdit" value="Edit" onclick="return(confirm('Are You Sure?'));" />
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
</form>