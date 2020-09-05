<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 09/02/2017
 * Time: 12:39 AM
 */
abstract class Base_Controller extends CI_Controller
{
    public $user_id;
    public $user_ref_id;
    public $role;
    const ADMIN = 1;
    const USER = 0;

    public abstract function index();

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_ref_id = $this->session->userdata('ref_id');
        $this->role = $this->session->userdata('role');
    }

    public function msg($msg)
    {
        $this->session->set_flashdata('msg', $msg);
    }

    public function debug($data)
    {
        echo "<pre>";
        print_r($data);
        exit();
    }

    public function pagination($base_url, $per_page, $total)
    {
        $this->load->library('pagination');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev;_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
    }

    public function page_not_found()
    {
        $data['content'] = $this->load->view('frontend/page/page_not_found', "", true);
        $this->load->view('frontend/index', $data);
    }

    public function isAuth()
    {
        if ($this->user_id != null) {
            return true;
        } else {
            return false;
        }
    }

    public function numFormat($n)
    {
        $formatted = '';
        if ($n >= 1000 && $n < 1000000) {
            if ($n % 1000 === 0) {
                $formatted = ($n / 1000);
            } else {
                $formatted = substr($n, 0, -3) . '.' . substr($n, -3, -2);

                if (substr($formatted, -1, 1) === '0') {
                    $formatted = substr($formatted, 0, -2);
                }
            }
            $formatted .= 'k';
        }
        echo $formatted;

    }

    public function pointCommission($amount, $userId)
    {
        //reference sponsor add point
        $parent_user_point['point_value'] = $amount / 10;
        $parent_user_point['user_id'] = $userId;
        $parent_user_point['incoming_point_type_id'] = $this->getIncomingPointTypeIdByKey(Commission);
        $parent_user_point['io_status'] = POINT_IN;
        $this->db->insert('tbl_user_point', $parent_user_point);
    }


    private function getIncomingPointTypeIdByKey($type_key)
    {
        $data = $this->db->select('*')->from('tbl_incoming_point_type')->where('point_type_key', $type_key)->get()->row();
        return $data->point_type_id;
    }

    public function balanceCommission($amount, $refId)
    {
        $this->load->model('balance_model');
        $b_history['balance_type_id'] = $this->balance_model->getUserBalanceTypeIdByKey(Deposit);
        $b_history['amount'] = $amount / 10;
        $b_history['user_id'] = $refId;
        $b_history['balance_source'] = $this->balance_model->getBalanceSourceIdByKey(Balance_Commission);
        $this->db->insert('tbl_balance_history', $b_history);
    }


    public function getParentUserIdByUserId($userId)
    {
        $id = $this->common_model->getParentUserIdByReferrerUserId($userId);

        return $id;
    }

    public function insertToCompanyBalance($amount, $userId, $balanceType)
    {
        $this->load->model('balance_model');
        $b_history['balance_type_id'] = $this->balance_model->getUserBalanceTypeIdByKey(Withdraw);
        $b_history['amount'] = $amount;
        $b_history['user_id'] = $userId;
        $b_history['balance_source'] = $this->balance_model->getBalanceSourceIdByKey($balanceType == Company_Vat ? Vat : Company_Commission);

        $com['amount'] = $amount;
        $com['balance_type'] = $balanceType;
        $com['user_id'] = $userId;

        $this->db->insert('tbl_company_balance', $com);
        $this->db->insert('tbl_balance_history', $b_history);
    }
    public function insertToBalanceHistory($userId, $amount, $balSource, $typeKey)
    {
        $this->load->model('balance_model');
        $b_history['balance_type_id'] = $this->balance_model->getUserBalanceTypeIdByKey($typeKey);
        $b_history['amount'] = $amount;
        $b_history['user_id'] = $userId;
        $b_history['balance_source'] = $this->balance_model->getBalanceSourceIdByKey($balSource);
        $this->db->insert('tbl_balance_history', $b_history);
    }

    public function insertToUserPoint($pointValue, $userId, $incomingPointTypeId, $ioStatus)
    {
        $this->load->model('common_model');
        $user_point['point_value'] = $pointValue;
        $user_point['user_id'] = $userId;
        $user_point['incoming_point_type_id'] = $this->common_model->getIncomingPointTypeIdByKey($incomingPointTypeId);
        $user_point['io_status'] = $ioStatus;
        $this->db->insert('tbl_user_point', $user_point);
    }
}