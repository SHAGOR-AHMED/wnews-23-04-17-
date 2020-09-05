<?php

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 20/02/2017
 * Time: 1:15 AM
 */
class Point_model extends CI_Model
{
    public function get_point_value()
    {
        $result = $this->db->select('*')
            ->from('tbl_point as p')
            ->JOIN('tbl_incoming_point_type as pt', 'p.point_type_id=pt.point_type_id')
            ->order_by('active', 'DESC')
            ->get()->result();
//        $point = $this->db->select('p.point_value,p.point_type_id,pt.point_type_key,p.active')
//            ->from('tbl_incoming_point_type as pt')
//            ->join("tbl_point as p", "pt.point_type_id=p.point_type_id")
//            ->get()->result();
        return $result;

    }

    public function get_company_point_info($perPage, $offset)
    {
        if ($offset == null) {
            $offset = 0;
        }
        $result = $this->db->select('*')
            ->from('tbl_company_point')
            ->limit($perPage, $offset)
            ->get()->result();
        return $result;
    }

    public function save_point_value($data)
    {
        if ($data['active'] == 1) {
            $this->db->set('active', 0)->where('point_type_id', $data['point_type_id'])->update('tbl_point');
        }

        $isInsert = $this->db->insert('tbl_point', $data);
        if ($isInsert) {
            return true;
        } else {
            return false;
        }
    }

    public function save_company_point_value($data)
    {
        $isInsert = $this->db->insert('tbl_company_point', $data);
        if ($isInsert) {
            return true;
        } else {
            return false;
        }
    }

}