<?php

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 22/02/2017
 * Time: 11:25 PM
 */
class Common_model extends CI_Model
{
    public function getIncomingPointType()
    {
        $data = $this->db->select('*')->from('tbl_incoming_point_type')->get()->result();
        return $data;
    }

    public function calculation_point($userId, $referrerId)
    {

        //insert point to new user
        $user_point['user_id'] = $userId;
        $user_point['point_value'] = USER_ADD_POINT_FOR_CREATE_ACCOUNT;
        $user_point['incoming_point_type_id'] = $this->getIncomingPointTypeIdByKey(New_Member);
        $user_point['io_status'] = POINT_IN;

        //end
        //referrer point deduct
        $deduct_ref['point_value'] = USER_DEDUCT_POINT_FOR_ADD_NEW_MEMBER;
        $deduct_ref['user_id'] = $referrerId;
        $deduct_ref['incoming_point_type_id'] = $this->getIncomingPointTypeIdByKey(Deduct_From_User_For_Add_New_Member);
        $deduct_ref['io_status'] = POINT_OUT;
//        $deduct_ref['active'] = 0;// 0 means inactive
        //end
        //company point
        $comp['point_value'] = COMPANY_POINT_ADD_WHICH_DEDUCT_FROM_USER_IN_ADD_NEW_MEMBER;
        $comp['in_from'] = Company_point_in_from_user;
        $comp['io_status'] = POINT_IN;
        //end
        if ($this->session->userdata('role') != Admin) {
            //reference sponsor add point
            $parent_user_point['point_value'] = REFERRER_ADD_POINT_FOR_ADD_USER / 10;
            $parent_user_point['user_id'] = $this->getParentUserIdByReferrerUserId($referrerId);
            $parent_user_point['incoming_point_type_id'] = $this->getIncomingPointTypeIdByKey(Reference_Sponsor);
            $parent_user_point['io_status'] = POINT_IN;
            //end
            // add referrer point for add new member
            $ref_add_member['point_value'] = REFERRER_ADD_POINT_FOR_ADD_USER;
            $ref_add_member['user_id'] = $referrerId;
            $ref_add_member['incoming_point_type_id'] = $this->getIncomingPointTypeIdByKey(Referrer_Add_New_Member);
            $ref_add_member['io_status'] = POINT_IN;
        }
        //end
        $this->db->trans_start();
        $this->db->insert('tbl_user_point', $user_point);
        $this->db->insert('tbl_user_point', $deduct_ref);
        if ($this->session->userdata('role') != Admin) {
            $this->db->insert('tbl_user_point', $parent_user_point);
            $this->db->insert('tbl_user_point', $ref_add_member);
        }
        $this->db->insert('tbl_company_point', $comp);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function getParentUserIdByReferrerUserId($refUId)
    {
        $ref = $this->db->select('parent_user_ref_id')->from('tbl_users')->where('user_id', $refUId)->get()->row();

        $parentId = $this->db->select('user_id')->from('tbl_users')->where(trim('reference_id'), trim($ref->parent_user_ref_id))->get()->row();

        return $parentId->user_id;
    }

    public function getIncomingPointTypeIdByKey($type_key)
    {
        $data = $this->db->select('*')->from('tbl_incoming_point_type')->where('point_type_key', $type_key)->get()->row();
        return $data->point_type_id;
    }

    public function checkMemberIsAccepted($memId)
    {
        $user = $this->db->select('is_accepted')->from('tbl_users')->where("user_id", $memId)->get()->row();
        if ($user->is_accepted == Approved) {
            return true;
        }
        return false;
    }

    public function checkEnoughPointForAddMember($refId)
    {
        $in_point = $this->db->SELECT_SUM('point_value')->from('tbl_user_point')->where('user_id', $refId)->where('active', 1)->where('io_status', POINT_IN)->get()->row();
        $out_point = $this->db->SELECT_SUM('point_value')->from('tbl_user_point')->where('user_id', $refId)->where('active', 1)->where('io_status', POINT_OUT)->get()->row();

        $point = $in_point->point_value - $out_point->point_value;

        if ($point < USER_DEDUCT_POINT_FOR_ADD_NEW_MEMBER) {
            return false;
        } else {
            return true;
        }
    }

    public function getUserBalanceReqDetails($balanceReqId)
    {
        $data = $this->db->select("*")->from('tbl_user_balance_request')->where('user_balance_request_id', $balanceReqId)->get()->row();
        return $data;
    }

    public function getUserBalanceReqDetailsInfo($balanceReqId)
    {
        $data = $this->db->select("u.full_name,u.email,ub.*")
            ->from('tbl_user_balance_request ub')
            ->JOIN('tbl_users as u', "ub.user_id=u.user_id", "left")
            ->where('ub.user_balance_request_id', $balanceReqId)
            ->get()->row();
        return $data;
    }

    public function checkPinNumber($pinNumber, $user_balance_req_id)
    {
        $data = $this->db->select('*')->from('tbl_user_balance_request')->where('user_balance_request_id', $user_balance_req_id)->get()->row();
        if (!empty($data)) {
            if ($data->balance_pin == $pinNumber) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function checkUserId($userId)
    {
        $check = $this->db->select('*')->from('tbl_users')->where('user_id', $userId)->get()->row();
        if (is_null($check)) {
            return false;
        } else {
            return true;
        }
    }
}