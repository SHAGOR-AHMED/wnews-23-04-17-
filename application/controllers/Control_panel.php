<?php

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 09/02/2017
 * Time: 12:38 AM
 */
class Control_panel extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (isset($this->user_id)) {
            if ($this->role != Admin)
                redirect('home');
        } else {
            redirect('home');
        }

        $this->load->model('back_model');
        $this->load->model('point_model');
        $this->load->model('balance_model');
        $this->load->model('common_model');
        $this->load->helper('point_helper');
        $this->load->model('news_model');
    }

    public function index()
    {
        $data['menu'] = $this->load->view('backend/menu', '', true);
        $data['main_content'] = $this->load->view('backend/blank', '', true);
        $this->load->view('backend/index', $data);
    }

    /*
     * members area
     */
    public function members()
    {
        $this->load->helper('user_helper');
        $total = $this->back_model->count_all_user();
        $perPage = 20;
        $this->pagination(base_url('control_panel/members/'), $perPage, $total);
        $data['users'] = $this->back_model->get_all_user_list($perPage, $this->uri->segment(3));
        $data['menu'] = $this->load->view('backend/menu', '', true);
        $data['main_content'] = $this->load->view('backend/member/members', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function memberDetails($userId = null)
    {
        if ($userId != null) {
            $this->load->helper('user_helper');
            $data['user_info'] = $this->back_model->get_user_info($userId);
            $data['menu'] = $this->load->view('backend/menu', '', true);
            $data['main_content'] = $this->load->view('backend/member/member_details', $data, true);
            $this->load->view('backend/index', $data);
        } else
            $this->page_not_found();
    }

    public function membersByMemberID($member_id = null)
    {
        if ($member_id != null) {
            $this->load->library('pagination');
            $data['users'] = $this->back_model->get_user_list_by_parent_ref_id($member_id);
            $data['menu'] = $this->load->view('backend/menu', '', true);
            $data['main_content'] = $this->load->view('backend/member/members', $data, true);
            $this->load->view('backend/index', $data);
        } else
            $this->page_not_found();
    }

    public function searchMembersByRefID($searchVal = null)
    {
        if ($searchVal != null) {
            $this->load->library('pagination');
            $data['users'] = $this->back_model->search_user_list_by_ref_id($searchVal);
            if ($data['users'] == null) {
                $this->msg("No Member Found ..");
            }
            $data['menu'] = $this->load->view('backend/menu', '', true);
            $data['main_content'] = $this->load->view('backend/member/members', $data, true);
            $this->load->view('backend/index', $data);
        } else {
            $this->msg("No data found !");
            redirect('control_panel/members');

        }
    }

    public function acceptMemberByParentMember($memId = null, $refId = null)
    {
        $this->load->model('common_model');
        if ($this->role != Admin && $memId == null && $refId == null) {
            echo "Sorry !";
        } else {
            if (!$this->common_model->checkEnoughPointForAddMember($refId)) {
                $this->msg('Sorry You haven\'t enough Point to add new member !');
                redirect('control_panel/members');
            }
            if (!$this->pointCalculation($memId, $refId)) {
                $this->msg('Failed To Accept ! Something Went Wrong in the system !');
            } else {
                $this->msg("Accepted..");
                $this->db->set('is_accepted', 1)->set('is_active', 1)->where('user_id', $memId)->update('tbl_users');
            }
            redirect('control_panel/members');
        }
    }


    private function pointCalculation($userId, $referrerId)
    {
        $point_cal = $this->common_model->calculation_point($userId, $referrerId);
        return $point_cal;
    }

    public function activeMemberByReferrer($memId)
    {
        if ($this->role != Admin) {
            echo "Sorry !";
        } else {
            $this->db->set('is_active', 1)->where('user_id', $memId)->update('tbl_users');
            redirect('control_panel/members');
        }
    }

    public function inActiveMemberByReferrer($memId)
    {
        $this->db->set('is_active', 0)->where('user_id', $memId)->update('tbl_users');
        redirect('control_panel/members');
    }

    /*
     * messages
     */
    public function messages()
    {
        $this->load->helper('user_helper');
        $total = $this->back_model->count_admin_sent_msg($this->user_id);
        $perPage = 20;
        $this->pagination(base_url('control_panel/messages/'), $perPage, $total);
        $data['userMessage'] = $this->back_model->get_admin_user_message($perPage, $this->uri->segment(3), $this->user_id);
        $data['publicMessage'] = $this->back_model->get_admin_public_message($perPage, $this->uri->segment(3), $this->user_id);
        $data['menu'] = $this->load->view('backend/menu', '', true);
        $data['main_content'] = $this->load->view('backend/msg/messages_by_admin', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function getMessageDetails($msg_id = null)
    {
        if ($msg_id != null) {
            $this->load->model('user_model');
            $data = $this->user_model->get_user_message_details($msg_id);
            echo "<h4 style='padding: 5px; line-height: 2'>" . $data->msg_content . "</h4>";
        }
    }

    public function sendMessage()
    {
        $this->load->model('user_model');
        $data['from_user_id'] = $this->session->userdata('user_id');
        $data['msg_title'] = $this->input->post('msg_title', true);
        $data['msg_content'] = $this->input->post('msg_content', true);
        $data['public'] = $this->input->post('public', true);
        if ($data['public'] == 5) {
            $this->msg("Please Select a message type");
            redirect("control_panel/messages");
        }
        if ($data['public'] == 0) {
            $data['to_user_id'] = $this->input->post('user_id', true);
        } else if ($data['public'] == 0) {
            if ($this->input->post('user_id', true) == null) {
                $this->msg("Please Select a member to send message");
                redirect("control_panel/messages");
            }
        }
        $this->user_model->commonInsert('tbl_message', $data);
        $this->msg("Message has been sent successfully !");
        redirect("control_panel/messages");
    }


    /*
     * Point
     */
    public function managePointTypeValue()
    {
        $this->load->helper('point_helper');
        $data['point'] = $this->point_model->get_point_value();
        $data['menu'] = $this->load->view('backend/menu', '', true);
        $data['main_content'] = $this->load->view('backend/point/manage_point_value', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function manageCompanyPoint()
    {
        $per_page = 50;
        $total = $this->db->count_all('tbl_company_point');
        $this->pagination('control_panel/manageCompanyPoint/', $per_page, $total);
        $data['point'] = $this->point_model->get_company_point_info($per_page, $this->uri->segment(3));
        $data['menu'] = $this->load->view('backend/menu', '', true);
        $data['main_content'] = $this->load->view('backend/point/manage_company_point', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function addPointValue()
    {
        $data['point_type_id'] = $this->input->post('point_type_id', true);
        $data['point_value'] = $this->input->post('point_value', true);
        $data['active'] = $this->input->post('active', true);
        $addPv = $this->point_model->save_point_value($data);
        if ($addPv) {
            $this->msg("Success");
        } else {
            $this->msg("Failed !");
        }
        redirect('control_panel/managePointTypeValue');

    }

    public function companyPointEntry()
    {
        $data['point_value'] = $this->input->post('point', true);
        if (!empty($data['point_value'])) {
            $data['in_from'] = 1;
            $data['io_status'] = POINT_IN;
            $data['in_by'] = $this->user_id;
            $addPv = $this->point_model->save_company_point_value($data);
            if ($addPv) {
                $this->msg("Success");
            } else {
                $this->msg("Failed !");
            }
            redirect('control_panel/manageCompanyPoint');
        } else {
            $this->msg("Point filed is empty !");

            redirect('control_panel/manageCompanyPoint');
        }
    }

    /*
     * End pont
     */
    /*
     * balance
     */
    public function userBalanceEntry()
    {
        $data['menu'] = $this->load->view('backend/menu', '', true);
        $data['main_content'] = $this->load->view('backend/balance/balance_entry', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function searchUserByRef($refId = null)
    {
        if ($refId != null) {
            $data = $this->back_model->searchUserByRefId($refId);
            if (!empty($data) && $data->user_id != $this->user_id) {
                $ta['current_balance'] = $this->balance_model->getUserCurrentBalance($data->user_id);
                $ta['user_id'] = $data->user_id;
                $ta['full_name'] = $data->full_name;
                $view = $this->load->view('backend/balance/user_balance_entry_form', $ta, true);
                echo '<br/><br/>' . $view;
            } else {
                echo "No user Found ";
            }
        }
    }

    public function entryBalanceToUser()
    {
        //user balance transaction
        $trx['user_trx_type_id'] = $this->balance_model->getUserTrxTypeIdByKey(Deposit);
        $trx['amount'] = $this->input->post('amount', true);
        $trx['user_id'] = $this->input->post('user_id', true);
        //insert to balance history
        $b_history['balance_type_id'] = $this->balance_model->getUserBalanceTypeIdByKey(Debit);
        $b_history['amount'] = $this->input->post('amount', true);
        $b_history['user_id'] = $this->input->post('user_id', true);
        $b_history['balance_source'] = $this->balance_model->getBalanceSourceIdByKey(Transaction);
        if (!empty($trx['amount'])) {
            $insert = $this->balance_model->userBalanceTrx($trx, $b_history);
            if ($insert) {
                $this->balanceCommission($b_history['amount'], $this->getParentUserIdByUserId($b_history['user_id']));
                $this->msg('Added Balance To User Account ...');
            } else {
                $this->msg('Failed');
            }
        } else {
            $this->msg('Amount is required ...');
        }
        redirect('control_panel/userBalanceEntry');
    }

    public function userBalanceReq()
    {
        $data['bal_req'] = $this->balance_model->getAllUserRequestedBalanceHistory();;
        $data['menu'] = $this->load->view('backend/menu', '', true);
        $data['main_content'] = $this->load->view('backend/balance/user_balance_req', $data, true);
        $this->load->view('backend/index', $data);
    }


    public function updateRequestStatus($balanceReqId, $status)
    {

        $this->db->set('request_status', $status)
            ->set('approved_by', $this->user_id)
            ->where('user_balance_request_id', $balanceReqId)
            ->update('tbl_user_balance_request');

    }

    public function proceedReq($balanceReqId = null)
    {
        if ($balanceReqId != null) {
            $data['balance_req_id'] = $balanceReqId;
            $data['menu'] = $this->load->view('backend/menu', '', true);
            $data['main_content'] = $this->load->view('backend/balance/proceed_user_req', $data, true);
            $this->load->view('backend/index', $data);
        } else {
            redirect("control_panel/page_not_found");
        }
    }

    public function proceedBalanceReq()
    {
        $user_balance_req_id = $this->input->post('user_balance_req_id', true);
        $pin = $this->input->post('pin_number', true);
        if (!empty($pin)) {
            $this->db->set('balance_pin', $pin)->where('user_balance_request_id', $user_balance_req_id)->update('tbl_user_balance_request');
            $this->updateRequestStatus($user_balance_req_id, Lock_by_Pin);
            $this->msg("Accept and Pin Created... Pin is : " . $pin);
            $balanceReqDet = $this->common_model->getUserBalanceReqDetailsInfo($user_balance_req_id);
            $data['subject'] = "Balance Request Accepted";
            $data['full_name'] = $balanceReqDet->full_name;
            $data['to_address'] = $balanceReqDet->email;
            $data['pin'] = $pin;
            $data['amount'] = $balanceReqDet->request_amount;
            $this->mailer_model->sendPinNumberEmail($data, "user_pin");
        } else {
            $this->msg('Create a pin please... !');
        }
        redirect("control_panel/userBalanceReq");

    }

    public function cancelRequest($user_balance_request_id = null)
    {
        if ($user_balance_request_id != null) {
            $this->db->set('request_status', Canceled)->where('user_balance_request_id', $user_balance_request_id)->update('tbl_user_balance_request');
            $this->msg("Request Cancelled");
            redirect("control_panel/userBalanceReq");
        } else {
            redirect("control_panel/page_not_found");
        }

    }

    /*
     * end
     */
    public function vatCommissionGetFromUser()
    {
        $total = $this->db->count_all('tbl_company_balance');
        $per_page = 40;
        $this->pagination('control_panel/vatCommissionGetFromUser', $per_page, $total);
        $data['userVatComm'] = $this->back_model->getCompanyBalanceInfo($per_page, $this->uri->segment(3));
        $data['menu'] = $this->load->view('backend/menu', '', true);
        $data['main_content'] = $this->load->view('backend/balance/user_vat_commission', $data, true);
        $this->load->view('backend/index', $data);
    }

//---------------------- Ads panel ----------------------------------//

    public function ads_info()
    {
        $data['ads_info'] = $this->news_model->select_ads_info();;
        $data['menu'] = $this->load->view('backend/menu', '', true);
        $data['main_content'] = $this->load->view('backend/ads_info', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function edit_ads($id)
    {
        $data['ads_info'] = $this->news_model->select_ads_info_by_id($id);
        $data['menu'] = $this->load->view('backend/menu', '', true);
        $data['main_content'] = $this->load->view('backend/ads_edit', $data, true);
        $this->load->view('backend/index', $data);

    }

    public function update_ads_info()
    {

        $data = array();
        $data['id'] = $this->input->post('id', true);
        $data['site_link'] = $this->input->post('site_link', true);

        /*image upload*/
        $config['upload_path'] = 'assets/frontend/np/adsimage/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = false;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('img_name')) {
//            $error = $this->upload->display_errors();
//            $this->msg($error);
//            redirect("user/addNews");
        } else {
            $uploadImage = $this->upload->data();
            if ($uploadImage['is_image'] == 1)
                $data['img_name'] = $uploadImage['file_name'];
            else {
                $this->msg("Invalid File Type");
            }
        }
        $this->db->where('id', $data['id'])->update('kha_ads_info', $data);

        $this->msg('Update Ads Information Successfully..!!!');

        redirect('control_panel/ads_info');
    }

    public function page_not_found()
    {
        parent::page_not_found();
    }

    /*
     * logout
     */
    public function logout()
    {

        session_destroy();
        redirect("home");
    }
}