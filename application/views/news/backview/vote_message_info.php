<form method="post" name="form1" action="" enctype="multipart/form-data">

<link href="<?= base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>" rel="stylesheet" type="text/css" />

<div class="col-md-11" style="margin-left:50px; margin-top:20px;">
<div class="box">
      <div class="box-header">
        <h3 class="box-title">Vote Message Information</h3>
        <a href="<?= base_url('backend/add_vote_msg');?>">
          <input name="submit" type="button" class="btn btn-success btn-sm" value="Add New Record" />
        </a>
      </div>
      <div class="box-body no-padding">
		<table width="973" align="center" class="table table-condensed">
            <tr>
                <td>Vote Message ID</td>
                <td>Vote Message</td>
                <td>Action</td>
            </tr>
			<?php foreach($vote_message_info as $vote_info){ ?>
				<tr>
                    <td><?php echo $vote_info->vote_msg_id; ?></td>       
                    <td><?php echo $vote_info->vote_msg; ?></td>
                    <td>
                        <a href="<?= base_url();?>backend/edit_vote_msg/<?php echo $vote_info->vote_msg_id; ?>">
                          <input name="sub" type="button" class="btn btn-info btn-sm" value="Edit"/>
                        </a>

                        <a href="<?= base_url();?>backend/delete_vote_msg/<?php echo $vote_info->vote_msg_id; ?>">
                          <input name="sub" type="button" class="btn btn-danger btn-sm" value="Delete" onclick="return(confirm('Are You Sure?'));" />
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
                            <input type="hidden" name="vote_msg_id" id="txtRec" value="<?php echo $vote_info->vote_msg_id; ?>" />
                    </td>
                </tr>

			<?php } ?>
        </table>
      </div><!-- /.box-body -->
    </div>
</div> 
    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('js/bootstrap.min.js');?>" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('js/AdminLTE/app.js');?>" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('js/AdminLTE/demo.js');?>" type="text/javascript"></script>        
    <!-- CK Editor -->
    <script src="<?= base_url('js/plugins/ckeditor/ckeditor.js');?>" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?= base_url('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('top_newxs');
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });
    </script>
</form>