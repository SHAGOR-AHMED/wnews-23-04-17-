<?php

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 10/02/2017
 * Time: 12:53 AM
 */
class User_model extends Base_Model
{
    public function check_user_login_info($ref_id, $pass)
    {
        $row = $this->db->select('reference_id,user_id,full_name,u_image,role')->from('tbl_users')->where('reference_id', $ref_id)->where('password', $pass)->where('is_active', 1)->get()->row();
        return $row;
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

    public function update_user_information($data, $user_id)
    {
        $this->db->where('user_id', $user_id)->update('tbl_users', $data);
    }

    public function get_user_receive_message($perPage, $offset, $userId)
    {
        if ($offset == null) {
            $offset = 0;
        }
        $query = "SELECT m.*,u.full_name,u.role,u.reference_id from tbl_message as m LEFT JOIN tbl_users as u ON m.from_user_id=u.user_id WHERE to_user_id =  $userId OR PUBLIC =1 ORDER BY m.msg_id DESC limit $perPage OFFSET $offset";
        $row = $this->db->query($query)->result();

        return $row;

    }

    public function get_user_sent_item($perPage, $offset, $userId)
    {
        if ($offset == null) {
            $offset = 0;
        }
        $query = "SELECT m.*,u.full_name,u.reference_id from tbl_message as m LEFT JOIN tbl_users as u ON m.to_user_id=u.user_id WHERE from_user_id =  $userId ORDER BY m.msg_id DESC limit $perPage OFFSET $offset";
        $row = $this->db->query($query)->result();

        return $row;

    }

    public function count_user_msg($userId)
    {
        $query = "SELECT m.msg_id from tbl_message as m LEFT JOIN tbl_users as u ON m.from_user_id=u.user_id WHERE to_user_id =  $userId OR PUBLIC =1";
        $row = $this->db->query($query)->num_rows();
        return $row;
    }

    public function count_user_sent_msg($userId)
    {
        $query = "SELECT m.msg_id from tbl_message as m LEFT JOIN tbl_users as u ON m.to_user_id=u.user_id WHERE from_user_id =  $userId";
        $row = $this->db->query($query)->num_rows();
        return $row;
    }

    public function get_pending_user_list_by_parent_ref_id($p_ref_id)
    {
        $result = $this->db->select('full_name,user_id,reference_id,mobile,is_active,is_accepted,user_create_date')
            ->from('tbl_users')
            ->where('parent_user_ref_id', $p_ref_id)
            ->where('is_accepted', 0)
            ->get()->result();
        return $result;
    }

    public function get_active_user_list_by_parent_ref_id($p_ref_id)
    {
        $result = $this->db->select('full_name,user_id,reference_id,mobile,is_active,user_create_date')
            ->from('tbl_users')
            ->where('parent_user_ref_id', $p_ref_id)
            ->where('is_active', 1)
            ->get()->result();
        return $result;
    }

    public function get_inActive_user_list_by_parent_ref_id($p_ref_id)
    {
        $result = $this->db->select('full_name,user_id,reference_id,is_accepted,mobile,is_active,user_create_date')
            ->from('tbl_users')
            ->where('parent_user_ref_id', $p_ref_id)
            ->where('is_active', 0)
            ->where('is_accepted', 1)
            ->or_where('is_accepted', 5)
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


    public function unique_email($email)
    {
        $row = $this->db->select('email')
            ->from('tbl_users')
            ->where('email', $email)
            ->get()->row();
        if (count($row) == 0)
            return false;
        else
            return true;
    }

    public function valid_mobile_no($no)
    {
        $row = $this->db->select('mobile')
            ->from('tbl_users')
            ->where('mobile', $no)
            ->get()->row();
        if (count($row) == 0)
            return false;
        else
            return true;
    }

    public function nid_unique($nid)
    {
        $row = $this->db->select('nid')
            ->from('tbl_users')
            ->where('nid', $nid)
            ->get()->row();
        if (count($row) == 0)
            return false;
        else
            return true;
    }

    public function search_ref_id($ref_id)
    {
        $row = $this->db->select('reference_id')
            ->from('tbl_users')
            ->where('reference_id', $ref_id)
            ->get()->row();
        if (count($row) == 0)
            return false;
        else
            return true;
    }

    public function count_user_id()
    {
        $row = $this->db->select('*')
            ->from('tbl_users')
            ->get()->num_rows();

        return $row;
    }

    public function get_user_message_details($msg_id)
    {
        $row = $this->db->select('msg_title,msg_content')
            ->from('tbl_message')
            ->where('msg_id', $msg_id)
            ->get()->row();
        return $row;
    }

    public function getUserTotalPointHistory($user_id)
    {

        $user_point = $this->db
            ->select('up.*,pt.point_type_name')
            ->from('tbl_user_point_history as up')
            ->JOIN('tbl_incoming_point_type as pt', "up.incoming_point_type_id=pt.point_type_id", "left")
            ->where("up.user_id", $user_id)
            ->order_by("up.incoming_point_type_id", "DESC")
            ->get()->result();
        return $user_point;
    }

    public function getIncomeByPostInfo($user_id)
    {
        $user_point = $this->db
            ->select('up.point_value,up.user_id,up.incoming_point_type_id,up.io_status,SUM(up.point_value) as point, pt.point_type_name,pt.point_type_id', FALSE)
            ->from('tbl_user_point as up')
            ->JOIN('tbl_incoming_point_type as pt', "up.incoming_point_type_id=pt.point_type_id", "left")
            ->where("up.io_status", POINT_IN)
            ->where("up.user_id", $user_id)
            ->where("up.active", 1)
            ->where("pt.has_default_value", 1)
            ->group_by("up.incoming_point_type_id")
            ->get()->result();
        return $user_point;
    }

    public function getIncomeByRefInfo($user_id)
    {
        $ignore = array($this->common_model->getIncomingPointTypeIdByKey(Point_Purchased));
        $user_point = $this->db
            ->select('up.point_value,up.user_id,up.incoming_point_type_id,up.io_status,SUM(up.point_value) as point, pt.point_type_key,pt.point_type_name,pt.point_type_id', FALSE)
            ->from('tbl_user_point as up')
            ->JOIN('tbl_incoming_point_type as pt', "up.incoming_point_type_id=pt.point_type_id", "left")
            ->where("up.io_status", POINT_IN)
            ->where("up.user_id", $user_id)
            ->where("up.user_id", $user_id)
            ->where("up.active", 1)
            ->where_not_in("up.incoming_point_type_id", $ignore)
            ->where("pt.has_default_value", 0)
            ->group_by("up.incoming_point_type_id")
            ->get()->result();
        return $user_point;
    }

    public function getInPointForWithdraw($user_id)
    {
        $this->load->model('common_model');
        $ignore = array($this->common_model->getIncomingPointTypeIdByKey(Point_Purchased));
        $inPoint = $this->db->select('SUM(point_value) as point')
            ->from('tbl_user_point')
            ->where('io_status', POINT_IN)
            ->where('active', 1)
            ->where('user_id', $user_id)
            ->where_not_in('incoming_point_type_id', $ignore)
            ->group_by('incoming_point_type_id')
            ->get()->row();
        if (is_null($inPoint)) {
            return null;
        }
        $this->debug($inPoint);
        return $inPoint->point;
    }


    public function getInPointHistory($user_id)
    {
        $user_point = $this->db
            ->select('up.*,pt.point_type_name')
            ->from('tbl_user_point as up')
            ->JOIN('tbl_incoming_point_type as pt', "up.incoming_point_type_id=pt.point_type_id", "left")
            ->where("up.io_status", POINT_IN)
            ->where("up.user_id", $user_id)
            ->order_by("up.user_point_id", "DESC")
            ->get()->result();
        return $user_point;
    }

    public function getOutPointHistory($user_id)
    {
        $user_point = $this->db
            ->select('up.*,pt.point_type_name')
            ->from('tbl_user_point as up')
            ->JOIN('tbl_incoming_point_type as pt', "up.incoming_point_type_id=pt.point_type_id", "left")
            ->where("up.io_status", POINT_OUT)
            ->where("up.user_id", $user_id)
            ->order_by("up.user_point_id", "DESC")
            ->get()->result();
        return $user_point;
    }

    public function getOutWithdrawPointHistory($user_id)
    {
        $user_point = $this->db
            ->select('up.*,pt.point_type_name')
            ->from('tbl_user_point as up')
            ->JOIN('tbl_incoming_point_type as pt', "up.incoming_point_type_id=pt.point_type_id", "left")
            ->where("up.active", 0)
            ->where("up.user_id", $user_id)
            ->order_by("up.user_point_id", "DESC")
            ->get()->result();
        return $user_point;
    }

//    public function getUserCurrentPoint($user_id)
//    {
//        $inPoint = $this->getInPointHistory($user_id);
//        $outPoint = $this->getOutPointHistory($user_id);
//
//
//        $current_balance = $inPoint - $outPoint;
//        return $current_balance;
//    }

    public function getUserCurrentPointHistory($user_id)
    {
        $inPoint = $this->db
            ->select('SUM(point_value) as point')
            ->from('tbl_user_point')
            ->where('io_status', POINT_IN)
            ->where('active', 1)
            ->where('user_id', $user_id)
            ->get()
            ->row();
        $outPoint = $this->db->select('SUM(point_value) as point')->from('tbl_user_point')->where('io_status', POINT_OUT)->where('active', 1)->where('user_id', $user_id)->get()->row();
        $point = $inPoint->point - $outPoint->point;
        return $point;
    }

    public function getUserWithdrawalPointHistory($user_id)
    {
        $this->load->model('common_model');
        $ignore = array($this->common_model->getIncomingPointTypeIdByKey(Point_Purchased));

        $inPoint = $this->db
            ->select('SUM(point_value) as point')
            ->from('tbl_user_point')
            ->where('io_status', POINT_IN)
            ->where('active', 1)
            ->where('user_id', $user_id)
            ->where_not_in('incoming_point_type_id', $ignore)
            ->get()->row();
        return $inPoint->point;
    }

    public function getUserWithdrawalPoint($user_id)
    {
        $this->load->model('common_model');
        $ignore = array($this->common_model->getIncomingPointTypeIdByKey(Point_Purchased));
        $inPoint = $this->db
            ->select('*')
            ->from('tbl_user_point')
            ->where('io_status', POINT_IN)
            ->where('active', 1)
            ->where('user_id', $user_id)
            ->where_not_in('incoming_point_type_id', $ignore)
            ->get()->result();
        return $inPoint;
    }

    public function getPointExchangeId($key)
    {
        $data = $this->db->select('*')->from('tbl_exchange_type')->where('exchange_type_key', $key)->get()->row();
        return $data->exchange_type_id;
    }

    public function buyPointByUser($user_point, $balance, $point_exchange)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_user_point', $user_point);
        $this->db->insert('tbl_balance_history', $balance);
        $this->db->insert('tbl_point_exchange', $point_exchange);
        $this->db->trans_complete();
        if ($this->db->trans_status() == false) {
            return false;
        } else {
            return true;
        }
    }

    public function userPointWithdraw($user_id, $balance, $point_exchange)
    {
        $ignore = array($this->common_model->getIncomingPointTypeIdByKey(Point_Purchased));
        $inPoint = $this->getUserWithdrawalPoint($user_id);
        //  $this->debug($inPoint);
        foreach ($inPoint as $item) {
            $getTotalPoint = $this->db->select('*')->from('tbl_user_point_history')->where('incoming_point_type_id', $item->incoming_point_type_id)->where('user_id', $user_id)->get()->row();

            if (count($getTotalPoint) != 0) {
                $point_type_point = $this->db->select_sum('point_value')->from('tbl_user_point')->where('user_id', $user_id)->where('incoming_point_type_id', $item->incoming_point_type_id)->where('active', 1)->get()->row();
                $total_point = $item->point_value + $point_type_point->point_value;
                $this->db->set("total_point", $total_point)->where('user_id', $user_id)->where('incoming_point_type_id', $item->incoming_point_type_id)->update("tbl_user_point_history");
            } else {
                $point_type_point = $this->db->select_sum('point_value')->from('tbl_user_point')->where('user_id', $user_id)->where('incoming_point_type_id', $item->incoming_point_type_id)->where('active', 1)->get()->row();

                $data['user_id'] = $user_id;
                $data['incoming_point_type_id'] = $item->incoming_point_type_id;
                $data['total_point'] = $point_type_point->point_value;
                $this->db->insert("tbl_user_point_history", $data);
            }
        }


        $this->db->trans_start();
        $this->db->insert('tbl_balance_history', $balance);
        $this->db->insert('tbl_point_exchange', $point_exchange);
        $this->db->set('active', 0)
            ->where('user_id', $user_id)
            ->where('io_status', POINT_IN)
            ->where_not_in('incoming_point_type_id', $ignore)
            ->update('tbl_user_point');
        $this->db->trans_complete();
        if ($this->db->trans_status() == false) {

            return false;
        } else {
            return true;
        }

    }

    public function getTnsInfo($userId)
    {
        $data = $this->db->select('u.reference_id as fromId,u.full_name as fromName,tn.*,tt.*,ur.reference_id as toRef,ur.full_name as toName')
            ->from('tbl_transfer as tn')
            ->join('tbl_users as u', "tn.user_id=u.user_id", "Left")
            ->join('tbl_users as ur', "tn.receiver_id=ur.user_id", "Left")
            ->join('tbl_transfer_type as tt', "tn.transfer_type_id=tt.transfer_type_id", "left")
            ->where("tn.user_id=" . $userId . " OR tn.receiver_id=" . $userId, NULL, FALSE)
            ->get()->result();
        return $data;
    }

    public function getTransferTypeIdByKey($key)
    {
        $data = $this->db->select('*')->from('tbl_transfer_type')->where('trans_type_key', $key)->get()->row();
        return $data->transfer_type_id;
    }

    public function count_user_news($user_id)
    {
//    $result=$this->db->select('*')->from('tbl_')
    }


}