<link href="<?= base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>" rel="stylesheet" type="text/css" />

<div class="col-md-11" style="margin-left:50px; margin-top:20px;">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Vote Message Information</h3>
        </div><!-- /.box-header -->

        <div class="box-body no-padding">
            <form method="post" name="form1" action="<?= base_url('backend/update_vote_msg');?>" enctype="multipart/form-data">
            	<table width="973" align="center" class="table table-condensed">
            		<tr>
                        <td colspan="2">Vote Message          
                            <label for="vote_msg_message"></label>
                            <textarea id="vote_msg" name="vote_msg" rows="3" cols="80"><?= $vote_msg_info->vote_msg; ?></textarea>
                            <input type="hidden" name="vote_msg_id" id="txtRec" value="<?php echo $vote_msg_info->vote_msg_id; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input name="sub" type="submit" class="btn btn-success btn-sm" value="Update Vote Message" /></td>
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
        </div>
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