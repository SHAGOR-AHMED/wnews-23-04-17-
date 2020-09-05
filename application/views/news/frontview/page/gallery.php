<?php
    $query = $this->db->query('SELECT * FROM tbl_gallery');
    $query1 = $query->row();
    //echo $query1->img_name;exit();
?>
<img data-u="image" src="<?= base_url('img/gallery/'.$query1->img_name);?>" height="200px" width="800px" />