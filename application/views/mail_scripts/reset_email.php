<?php
//$this->load->library('encrypt');
//$en_blogger_id=urlencode($this->encrypt->encode($blogger_id));
//$en_blogger_id= base64_encode($blogger_id);
//$id=$this->encrypt->encode($to_address);
//$id = str_replace("/","%F2F3F4F5", $en_to_address );
?>

<h3>Hello, <?php echo $admin_name; ?></h3>
<span>User address: <?php echo $to_address; ?></span>
<br/>
<span>
    To activate your account click the link bellow:
</span>
<br/>
<span>
    Activation Link: 
    <a href="<?php echo base_url(); ?>admin_login/reset_admin_password/<?php echo   $to_address; ?>">Click here/

        <?php
        $alpha = array(0, 'a', '+', 'b', 2, '@', 3, '&', 4, 'e', 5, 'f', '>', 'g');
        $code = '';
        $p_lenth=12;
        for($i=1; $i<=$p_lenth;$i++){
        $r_value = rand(0, 13);
        $code.=$alpha[$r_value];
        echo $code;
        }
        ?></a>

</span>
<h3>Thank you To Join our community !</h3>

