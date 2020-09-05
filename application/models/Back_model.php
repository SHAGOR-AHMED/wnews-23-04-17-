<?php

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 15/02/2017
 * Time: 11:43 PM
 */
class Back_model extends CI_Model
{
    public function get_all_user_list($perPage, $offset)
    {
        $result = $this->db->select('u_image,is_accepted,full_name,parent_user_ref_id,user_id,reference_id,mobile,is_active,user_create_date')
            ->from('tbl_users')
            ->order_by('user_id', 'DESC')
            ->limit($perPage, $offset)->get()->result();
        return $result;
    }

    public function count_all_user()
    {
        $result = $this->db->select('user_id')
            ->from('tbl_users')
            ->get()->num_rows();
        return $result;
    }

    public function get_user_info($userId)
    {
        $row = $this->db->select('u.*,con.con_name,con.phonecode,con.id as con_id,st.st_name,st.id as st_id')
            ->from('tbl_users as u')
            ->JOIN('countries as con', 'u.country=con.id', "left")
            ->JOIN('states as st', 'u.district=st.id', "left")
            ->where('u.user_id', $userId)
            ->get()->row();

        return $row;
    }

    public function get_user_list_by_parent_ref_id($p_ref_id)
    {

        $result = $this->db->select('u_image,full_name,user_id,parent_user_ref_id,reference_id,mobile,is_active,user_create_date')
            ->from('tbl_users')
            ->where('parent_user_ref_id=', trim($p_ref_id))
            ->get()->result();

        // $sql = "SELECT * from tbl_users WHERE  parent_user_ref_id =  '$p_ref_id' ORDER BY user_id DESC limit $offset , $perPage";
        //  $result = $this->db->query($sql)->result();
        return $result;
    }

    public function search_user_list_by_ref_id($searchVal)
    {
        $result = $this->db->select('u_image,full_name,user_id,parent_user_ref_id,reference_id,mobile,is_active,user_create_date')
            ->from('tbl_users')
            ->where('reference_id', $searchVal)
            ->get()->result();
        return $result;
    }

    public function count_user_by_parent($p_ref_id)
    {
        $result = $this->db->select('user_id')
            ->from('tbl_users')
            ->where('parent_user_ref_id', $p_ref_id)
            ->get()->num_rows();
        return $result;
    }

    public function get_admin_user_message($perPage, $offset, $admin_id)
    {
        if ($offset == null) {
            $offset = 0;
        }
        $result = $this->db->select('ur.full_name,u.parent_user_ref_id,ur.reference_id,u.mobile,m.*')
            ->from('tbl_message as m')
            ->JOIN('tbl_users as u', "m.from_user_id=u.user_id", 'left')
            ->JOIN('tbl_users as ur', "m.to_user_id=ur.user_id", 'left')
            ->where('m.from_user_id', $admin_id)
            ->where('u.role', 1)
            ->where('m.public', 0)
            ->order_by('m.date', "DESC")
            ->limit($perPage, $offset)->get()->result();
        return $result;
    }

    public function get_admin_public_message($perPage, $offset, $admin_id)
    {
        if ($offset == null) {
            $offset = 0;
        }
        $result = $this->db->select('u.mobile,m.*')
            ->from('tbl_message as m')
            ->JOIN('tbl_users as u', "m.from_user_id=u.user_id", 'left')
            ->where('m.from_user_id', $admin_id)
            ->where('u.role', 1)
            ->where('m.public', 1)
            ->order_by('m.date', "DESC")
            ->limit($perPage, $offset)->get()->result();
        return $result;
    }

    public function count_admin_sent_msg()
    {
        $result = $this->db->select('msg_id')
            ->from('tbl_message as m')
            ->JOIN('tbl_users as u', "m.from_user_id=u.user_id", 'left')
            ->where('u.role', 1)
            ->get()->num_rows();
        return $result;
    }

    public function searchUserByRefId($refId)
    {
        $data = $this->db->select('*')->from('tbl_users')->where('reference_id', $refId)->get()->row();

        return $data;
    }

    public function getCompanyBalanceInfo($perPage, $offset)
    {
        if ($offset == null) {
            $offset = 0;
        }
        $data = $this->db->select('c.*,u.reference_id,u.full_name')
            ->from('tbl_company_balance as c')
            ->JOIN("tbl_users as u", "c.user_id=u.user_id", "left")
            ->limit($perPage, $offset)
            ->order_by('c.cmp_balance_id', "DESC")
            ->get()->result();
        return $data;
    }
}