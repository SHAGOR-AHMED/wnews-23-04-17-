<?php

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 27/02/2017
 * Time: 6:58 PM
 */
class Balance_model extends CI_Model
{
    public function getUserBalanceTypeIdByKey($key)
    {
        $data = $this->db->select('*')->from('tbl_balance_type')->where('balance_type_key', $key)->get()->row();
        return $data->balance_type_id;
    }

    public function getUserTrxTypeIdByKey($key)
    {
        $data = $this->db->select('*')->from('tbl_trx_type')->where('trx_key', $key)->get()->row();
        return $data->trx_type_id;
    }

    public function getBalanceSourceIdByKey($key)
    {
        $data = $this->db->select('*')->from('tbl_balance_source')->where('balance_source_key', $key)->get()->row();
        return $data->balance_source_key;
    }

    public function userBalanceTrx($trx, $b_history)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_user_trx', $trx);
        $this->db->insert('tbl_balance_history', $b_history);
        $this->db->trans_complete();
        if ($this->db->trans_status() == false) {
            return false;
        } else {
            return true;
        }
    }

    public function getUserBalanceHistory($user_id)
    {
        $data = $this->db->select('bh.*,bs.*,bt.*')
            ->from('tbl_balance_history as bh')
            ->JOIN('tbl_balance_type as bt', 'bh.balance_type_id=bt.balance_type_id', "left")
            ->JOIN('tbl_balance_source as bs', 'bh.balance_source=bs.balance_source_id', "left")
            ->where('bh.user_id', $user_id)
            ->order_by('bh.balance_history_id', "DESC")
            ->get()->result();
        return $data;
    }

    public function getUserCurrentBalance($user_id)
    {
        $data =
            $this->db->select('SUM(bh.amount) as final_amount, bh.*,bs.*,bt.*')
                ->from('tbl_balance_history as bh')
                ->JOIN('tbl_balance_type as bt', 'bh.balance_type_id=bt.balance_type_id', "left")
                ->JOIN('tbl_balance_source as bs', 'bh.balance_source=bs.balance_source_id', "left")
                ->where('bh.user_id', $user_id)
                ->group_by('bt.balance_type_key')
                ->get()->result();

        $dep = 0;
        $with = 0;
        foreach ($data as $item) {
            if ($item->balance_type_key == Deposit) {
                $dep += $item->final_amount;
            } else if ($item->balance_type_key == Withdraw) {
                $with += $item->final_amount;
            }
        }
        return $dep - $with;
    }

//for user
    public function getUserRequestedBalanceHistory($user_id)
    {
        $data = $this->db
            ->select('br.*,tt.*,u.reference_id')
            ->from('tbl_user_balance_request as br')
            ->join('tbl_trx_type as tt', "br.trx_type_id=tt.trx_type_id", "Left")
            ->join('tbl_users as u', "br.parent_req_id=u.user_id", "Left")
            ->where('br.user_id', $user_id)
            ->order_by('user_balance_request_id', "desc")->get()->result();
        return $data;
    }

    public function getMyUserRequestedBalanceHistory($user_id)
    {
        $data = $this->db
            ->select('br.*,tt.*,u.user_id,u.full_name,u.reference_id')
            ->from('tbl_user_balance_request as br')
            ->join('tbl_trx_type as tt', "br.trx_type_id=tt.trx_type_id", "Left")
            ->join('tbl_users as u', "br.user_id=u.user_id", "Left")
            ->where('br.request_to', Balance_Request_To_Parent)
            ->where('br.parent_req_id', $user_id)
            ->order_by('user_balance_request_id', "desc")->get()->result();
        return $data;
    }

    public function getOtherUserRequestedBalanceHistory($user_id)
    {
        $data = $this->db
            ->select('br.*,tt.*,u.user_id,u.full_name,u.reference_id')
            ->from('tbl_user_balance_request as br')
            ->join('tbl_trx_type as tt', "br.trx_type_id=tt.trx_type_id", "Left")
            ->join('tbl_users as u', "br.user_id=u.user_id", "Left")
            ->where('br.request_to', Balance_Request_To_Any_Member)
            ->where('br.parent_req_id', $user_id)
            ->order_by('user_balance_request_id', "desc")->get()->result();
        return $data;
    }

//for admin
    public function getAllUserRequestedBalanceHistory()
    {
        $data = $this->db
            ->select('br.*,u.full_name,u.reference_id,tt.*')
            ->from('tbl_user_balance_request as br')
            ->join('tbl_users as u', "br.user_id=u.user_id", "Left")
            ->join('tbl_trx_type as tt', "br.trx_type_id=tt.trx_type_id", "Left")
            ->where('br.request_to', Balance_Request_To_Admin)
            ->order_by('br.user_balance_request_id', "desc")->get()->result();

        return $data;
    }
}