<?php

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 22.4.17
 * Time: 01:43 AM
 */
class Setting extends Base_Controller
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function deleteInactivePoint()
    {
        $this->db->where('active', 0)->delete('tbl_user_point');
        echo "Deleted !";
    }
}