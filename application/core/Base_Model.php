<?php

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 10/02/2017
 * Time: 12:54 AM
 */
class Base_Model extends CI_Model
{
    public function debug($data)
    {
        echo "<pre>";
        print_r($data);
        exit();
    }
    public function commonInsert($tbl, $data)
    {
        $this->db->insert($tbl, $data);
    }
}