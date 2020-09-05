<?php

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 10/02/2017
 * Time: 1:02 AM
 */
class User extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->role == Admin) {
            redirect('control_panel');
        }

        $this->load->model('user_model');
        $this->load->model('common_model');
        $this->load->model('balance_model');
        $this->load->model('news_model');
        $this->load->helper('point_helper');
        $this->load->library('form_validation');


    }

    public function index()
    {
        $this->load->helper('user_helper');
        $data['user_total_point'] = $this->user_model->getUserTotalPointHistory($this->user_id);
        $data['income_by_post'] = $this->user_model->getIncomeByPostInfo($this->user_id);
        $data['income_by_ref'] = $this->user_model->getIncomeByRefInfo($this->user_id);
        $data['user_info'] = $this->user_model->get_user_info($this->user_id);
        $data['content'] = $this->load->view('frontend/user_dashboard', $data, true);
        $this->load->view('frontend/index', $data);
    }

    public function profile()
    {
        $this->load->helper('user_helper');
        $data['user_info'] = $this->user_model->get_user_info($this->user_id);
        $data['content'] = $this->load->view('frontend/profile', $data, true);
        $this->load->view('frontend/index', $data);
    }

    public function editProfile()
    {
        $this->load->helper('user_helper');
        $data['user_info'] = $this->user_model->get_user_info($this->user_id);
        $data['content'] = $this->load->view('frontend/edit_profile', $data, true);
        $this->load->view('frontend/index', $data);
    }

    public function saveUser()
    {

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('full_name', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_users.email]');
        $this->form_validation->set_rules('mobile', 'Mobile No', 'required|is_unique[tbl_users.mobile]');
        $this->form_validation->set_rules('dob', 'Date of birth', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('father_name', 'Father Name', 'required');
        $this->form_validation->set_rules('mother_name', 'Mother No', 'required');
        $this->form_validation->set_rules('religion', 'Religion', 'required');
        $this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
        $this->form_validation->set_rules('sex', 'Sex', 'required|numeric');
        $this->form_validation->set_rules('district', 'district', 'required');
        $this->form_validation->set_rules('thana', 'thana', 'required');
        $this->form_validation->set_rules('u_union', 'Union', 'required');
        $this->form_validation->set_rules('village', 'Village', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('post_code', 'Post Code', 'required|numeric');
        $this->form_validation->set_rules('nid', 'NID', 'required|is_unique[tbl_users.nid]');
        $this->form_validation->set_rules('nominee_name', 'Nominee Name', 'required');
        $this->form_validation->set_rules('nominee_dob', 'Nominee Date of birth', 'required');
        $this->form_validation->set_rules('nominee_relation', 'Nominee Relation', 'required');
        $this->form_validation->set_rules('parent_user_ref_id', 'Reference ID', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('re_password', 'Re Password', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->helper('user_helper');
            $data['content'] = $this->load->view('frontend/user_reg', '', true);
            $this->load->view('frontend/index', $data);
        } else {
            $data = $this->getUserDataFromPost();
            $this->checkRefId($data['parent_user_ref_id']);
            $data['u_image'] = $this->uploadUserPhoto();
            $this->user_model->commonInsert('tbl_users', $data);
            $this->msg('Thank you ! Wait for activation from your Referrer !');
            $this->sendWelcomeEmail($data['full_name'], $data['email']);
            redirect("home/registration");
        }
    }

    private function sendWelcomeEmail($full_name, $email)
    {
        $data['subject'] = "Welcome  " . $full_name;
        $data['full_name'] = $full_name;
        $data['to_address'] = $email;
        $this->mailer_model->userWelcomeEmail($data, "user_welcome_email");
        $this->mailer_model->userWelcomeEmailToAdmin($full_name);
    }


    public function downloadRefId($refID)
    {
        $this->load->helper('download');
        $name = 'referenceID.txt';
        force_download($name, $refID);
    }

    private function getUserDataFromPost()
    {
        $user_id = trim($this->input->post('user_id', true));
        if ($user_id == null) {
            $refIdKey = $this->input->post('refIdKey', true);
            $data['reference_id'] = $this->getUserUniqueId($refIdKey);
            $data['password'] = md5(trim($this->input->post('password', true)));
        }
        $data['email'] = trim($this->input->post('email', true));
        $data['mobile'] = trim($this->input->post('mobile', true));
        $data['nid'] = trim($this->input->post('nid', true));
        $data['role'] = 0;
        $data['full_name'] = trim($this->input->post('full_name', true));
        $data['dob'] = trim($this->input->post('dob', true));
        $data['address'] = trim($this->input->post('address', true));
        $data['father_name'] = trim($this->input->post('father_name', true));
        $data['mother_name'] = trim($this->input->post('mother_name', true));
        $data['religion'] = trim($this->input->post('religion', true));
        $data['blood_group'] = trim($this->input->post('blood_group', true));
        $data['sex'] = trim($this->input->post('sex', true));
        $data['district'] = trim($this->input->post('district', true));
        $data['thana'] = trim($this->input->post('thana', true));
        $data['u_union'] = trim($this->input->post('u_union', true));
        $data['village'] = trim($this->input->post('village', true));
        $data['city'] = trim($this->input->post('city', true));
        $data['country'] = trim($this->input->post('country', true));
        $data['post_code'] = trim($this->input->post('post_code', true));
        $data['nominee_name'] = trim($this->input->post('nominee_name', true));
        $data['nominee_relation'] = trim($this->input->post('nominee_relation', true));
        $data['nominee_dob'] = trim($this->input->post('nominee_dob', true));
        $data['parent_user_ref_id'] = trim($this->input->post('parent_user_ref_id', true));
        $data['account_no'] = trim($this->input->post('account_no', true));
        $data['bank_name'] = trim($this->input->post('bank_name', true));

        return $data;
    }

    private function checkEmailForEdit($email, $userId)
    {
        $data = "SELECT email from tbl_users WHERE email Like '%$email%' and user_id <>$userId";
        $result = $this->db->query($data)->result();
        if (!empty($result)) {
            $this->msg('Your email already exits !');
            redirect('user/editProfile');
        }
    }

    private function checkMobileForEdit($mobile, $userId)
    {
        $data = "SELECT mobile from tbl_users WHERE mobile Like '%$mobile%' and user_id <>$userId";
        $result = $this->db->query($data)->result();
        if (!empty($result)) {
            $this->msg('Your mobile no  already exits !');
            redirect('user/editProfile');
        }
    }

    private function checkNidForEdit($nid, $userId)
    {
        $data = "SELECT nid from tbl_users WHERE nid Like '%$nid%' and user_id <>$userId";
        $result = $this->db->query($data)->result();
        if (!empty($result)) {
            $this->msg('Your National ID no is already exits !');
            redirect('user/editProfile');
        }
    }

    private function uploadUserPhoto()
    {
        $this->load->library('upload');
        $config['upload_path'] = './assets/u_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 150;
        $config['max_width'] = 300;
        $config['max_height'] = 300;
        $config['encrypt_name'] = false;
        $this->upload->initialize($config);
        if (empty($_FILES['u_image']['name'])) {
            return $config['upload_path'];
        }
        if (!$this->upload->do_upload('u_image')) {
            $error = $this->upload->display_errors();
            $dt['img_msg'] = $error;
            $this->session->set_userdata($dt);
            redirect(current_url());
        }
        $uploadImage = $this->upload->data();
        if ($uploadImage['is_image'] == 1)
            return $config['upload_path'] . $uploadImage['file_name'];
        else
            $this->msg("Invalid Image Please select jpg or png ");

        redirect("home/registration");
    }

    private function getUserUniqueId($refIdKey)
    {
        $user_row_count = $this->user_model->count_user_id();
        $user_id = $refIdKey . '_' . str_pad($user_row_count + 1, 10, '0', STR_PAD_LEFT);
        return $user_id;
    }

    public function checkRefId($id)
    {
        $check_ref = $this->user_model->search_ref_id($id);
        if ($check_ref == false) {
            $this->msg("<p style='color: red;'>Your Reference ID is Invalid !</p>");
            redirect("home/registration");
        }
    }

    public function getStateByCountryId($id = null)
    {
        if ($id != null) {
            $this->load->helper('user_helper');
            getAllStatesByCountryId($id);
        }
    }

    public function getCountryCode($id = null)
    {
        if ($id != null) {
            $phone_code = $this->db->select('*')->from('countries')->where('id', $id)->get()->row();
            echo '+' . $phone_code->phonecode;
        }

    }

    public function updateProfile()
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('full_name', 'Username', 'required');
        $this->form_validation->set_rules('dob', 'Date of birth', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('father_name', 'Father Name', 'required');
        $this->form_validation->set_rules('mother_name', 'Mother No', 'required');
        $this->form_validation->set_rules('religion', 'Religion', 'required');
        $this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
        $this->form_validation->set_rules('sex', 'Sex', 'required|numeric');
        $this->form_validation->set_rules('district', 'district', 'required');
        $this->form_validation->set_rules('thana', 'thana', 'required');
        $this->form_validation->set_rules('u_union', 'Union', 'required');
        $this->form_validation->set_rules('village', 'Village', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('post_code', 'Post Code', 'required|numeric');
        $this->form_validation->set_rules('nominee_name', 'Nominee Name', 'required');
        $this->form_validation->set_rules('nominee_dob', 'Nominee Date of birth', 'required');
        $this->form_validation->set_rules('nominee_relation', 'Nominee Relation', 'required');
        $this->form_validation->set_rules('parent_user_ref_id', 'Reference ID', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->helper('user_helper');
            $data['content'] = $this->load->view('frontend/edit_profile', '', true);
            $this->load->view('frontend/index', $data);
        } else {
            $data = $this->getUserDataFromPost();
            $user_id = trim($this->input->post('user_id', true));
            $this->checkEmailForEdit($data['email'], $user_id);
            $this->checkMobileForEdit($data['mobile'], $user_id);
            $this->checkNidForEdit($data['nid'], $user_id);
            $this->checkRefId($data['parent_user_ref_id']);
            if ($data['parent_user_ref_id'] == $this->session->userdata('ref_id')) {
                $this->msg("You can not use your own ID in referred by id ..");
                redirect("user/editProfile");
            }
            if ($this->updateUserPhoto() != null) {
                $data['u_image'] = $this->updateUserPhoto();
            }
            $this->user_model->update_user_information($data, $user_id);
            $this->msg('Your Profile Information Has Been Updated !');
            redirect("user/editProfile");
        }
    }

    private function updateUserPhoto()
    {
        $this->load->library('upload');
        $config['upload_path'] = './assets/u_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 150;
        $config['max_width'] = 300;
        $config['max_height'] = 300;
        $config['encrypt_name'] = false;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('u_image')) {
            return null;
        }
        $uploadImage = $this->upload->data();
        if ($uploadImage['is_image'] == 1)
            return $config['upload_path'] . $uploadImage['file_name'];
        else
            $this->msg("Invalid Image Please select jpg or png ");
        redirect("user/editProfile");
    }

    public function acceptMemberByParentMember($memId = null, $refId = null)
    {
        if ($this->role != USER && $memId == null && $refId == null) {
            echo "Sorry !";
        } else {
            $isApproved = $this->common_model->checkMemberIsAccepted($memId);
            if (!$isApproved) {
                if (!$this->common_model->checkEnoughPointForAddMember($refId)) {
                    $this->msg('Sorry You haven\'t enough Point to add new member  !');
                    redirect('user/memberList');
                }
                if (!$this->pointCalculation($memId, $refId)) {
                    $this->msg('Failed To Accept ! Something Went Wrong in the system !');
                } else {
                    $this->db->set('is_accepted', 1)->set('is_active', 1)->where('user_id', $memId)->update('tbl_users');
                    $user = $this->user_model->get_user_info($memId);
                    $data['subject'] = "Account Activation";
                    $data['full_name'] = $user->full_name;
                    $data['to_address'] = $user->email;
                    $data['reference_id'] = $user->reference_id;
                    $this->mailer_model->sendAccountConfirmEmail($data, "confirm_activation_email");

                }
            } else {
                $this->msg("Already Approved");
            }

            redirect('user/memberList');
        }
    }


    private function pointCalculation($userId, $referrerId)
    {
        $point_cal = $this->common_model->calculation_point($userId, $referrerId);
        return $point_cal;
    }

    public function activeMemberByReferrer($memId)
    {
        if ($this->role != USER) {
            echo "Sorry !";
        } else {
            $this->db->set('is_active', 1)->where('user_id', $memId)->update('tbl_users');
            redirect('user/memberList');
        }
    }

    public function inActiveMemberByReferrer($memId)
    {
        $this->db->set('is_active', 0)->where('user_id', $memId)->update('tbl_users');
        redirect('user/memberList');
    }

    public function cancelMemberByReferrer($memId)
    {
        $this->db->set('is_accepted', 5)->where('user_id', $memId)->update('tbl_users');
        redirect('user/memberList');
    }

    public function memberList()
    {
        // $total = $this->user_model->count_user_by_parent($this->session->userdata('ref_id'));
        // $perPage = 20;
        // $this->pagination(base_url('user/memberList/'), $perPage, $total);
        $data['activeUsers'] = $this->user_model->get_active_user_list_by_parent_ref_id($this->session->userdata('ref_id'));
        $data['pendingUsers'] = $this->user_model->get_pending_user_list_by_parent_ref_id($this->session->userdata('ref_id'));
        $data['inactiveUsers'] = $this->user_model->get_inActive_user_list_by_parent_ref_id($this->session->userdata('ref_id'));
        $data['content'] = $this->load->view('frontend/manage_member', $data, true);
        $this->load->view('frontend/index', $data);
    }

    public function userDetails($userId = null)
    {
        if ($userId != null) {
            $this->load->helper('user_helper');
            $data['user_info'] = $this->user_model->get_user_info($userId);
            $data['content'] = $this->load->view('frontend/user_details', $data, true);
            $this->load->view('frontend/index', $data);
        } else
            redirect('user/page_not_found');
    }

    /*
     * message
     */
    public function sendMessage()
    {
        $data['to_user_id'] = $this->input->post('user_id', true);
        $data['from_user_id'] = $this->session->userdata('user_id');
        $data['msg_title'] = $this->input->post('msg_title', true);
        $data['msg_content'] = $this->input->post('msg_content', true);
        $data['public'] = 0;
        $this->user_model->commonInsert('tbl_message', $data);
        $this->msg("Message has been sent successful !");
        redirect("user/messageList");
    }

    public function messageList()
    {
        $this->load->helper('user_helper');
        $total = $this->user_model->count_user_msg($this->user_id);
        $perPage = 20;
        $this->pagination(base_url('user/messageList/'), $perPage, $total);
        $data['message'] = $this->user_model->get_user_receive_message($perPage, $this->uri->segment(3), $this->user_id);
        $data['content'] = $this->load->view('frontend/message_list', $data, true);
        $this->load->view('frontend/index', $data);
    }

    public function sentItems()
    {
        $total = $this->user_model->count_user_sent_msg($this->user_id);
        $perPage = 20;
        $this->pagination(base_url('user/sentItems/'), $perPage, $total);
        $data['message'] = $this->user_model->get_user_sent_item($perPage, $this->uri->segment(3), $this->user_id);
        $data['content'] = $this->load->view('frontend/sent_items', $data, true);
        $this->load->view('frontend/index', $data);
    }

    public function getMessageDetails($msg_id = null)
    {
        if ($msg_id != null) {
            $data = $this->user_model->get_user_message_details($msg_id);
            echo "<h4 style='padding: 5px; line-height: 2'>" . $data->msg_content . "</h4>";
        }
    }

    /*
     * end message
     */
    /*
     * earning report
     */
    public function earningReport()
    {

        $data['user_total_point'] = $this->user_model->getUserTotalPointHistory($this->user_id);
        $data['user_current_point'] = $this->user_model->getUserCurrentPointHistory($this->user_id);
        $data['user_withdrawal_point'] = $this->user_model->getUserWithdrawalPointHistory($this->user_id);
        $data['all_incoming_type'] = $this->common_model->getIncomingPointType();
        $data['income_by_post'] = $this->user_model->getIncomeByPostInfo($this->user_id);
        $data['income_by_ref'] = $this->user_model->getIncomeByRefInfo($this->user_id);
        $data['content'] = $this->load->view('frontend/earning_report', $data, true);
        $this->load->view('frontend/index', $data);
    }

    /*
     * end earning report
     */
    public function userPoint()
    {
        $this->load->helper('point_helper');
        $data['user_out_withdraw_point_history'] = $this->user_model->getOutWithdrawPointHistory($this->user_id);
        $data['user_out_point_history'] = $this->user_model->getOutPointHistory($this->user_id);
        $data['user_in_point_history'] = $this->user_model->getInPointHistory($this->user_id);
        $data['content'] = $this->load->view('frontend/user_point_history', $data, true);
        $this->load->view('frontend/index', $data);
    }

    public function buyPointByUser()
    {
        $user_point['point_value'] = $this->input->post('point', true);
        $user_point['user_id'] = $this->user_id;
        $user_point['incoming_point_type_id'] = $this->common_model->getIncomingPointTypeIdByKey(Point_Purchased);
        $user_point['io_status'] = POINT_IN;
        if (!empty($user_point['point_value'])) {

            $this->checkUserBalanceToBuyPoint($this->user_id, $user_point['point_value'] * Per_Point_Rate);

            //deduct balance from user account
            $balance['user_id'] = $this->user_id;
            $balance['amount'] = $user_point['point_value'] * Per_Point_Rate;
            $balance['balance_type_id'] = $this->balance_model->getUserBalanceTypeIdByKey(Withdraw);
            $balance['balance_source'] = $this->balance_model->getBalanceSourceIdByKey(Point_Exchange);
            //point exchange
            $point_exchange['user_id'] = $this->user_id;
            $point_exchange['amount'] = $balance['amount'];
            $point_exchange['point_exchange_type_id'] = $this->user_model->getPointExchangeId(Money_To_Point);
            $insert = $this->user_model->buyPointByUser($user_point, $balance, $point_exchange);
            if (!$insert) {
                $this->msg("Failed");
            } else {
                $this->pointCommission($user_point['point_value'], $this->getParentUserIdByUserId($user_point['user_id']));
                $this->msg("Success !");
            }
        } else {
            $this->msg("Enter your point ...");
            redirect("user/userPoint");
        }
        redirect("user/userPoint");
    }

    public function checkUserBalanceToBuyPoint($user_id, $pointPrice)
    {
        $c_point = $this->balance_model->getUserCurrentBalance($user_id);

        if ($c_point < $pointPrice) {
            $this->msg("Insufficient Balance .....");
            redirect("user/userPoint");
        }
    }

    public function convertPointToBalance()
    {
        if ($this->user_id == null) {
            redirect('home');
        }

        $current_withdrawal_point_value = $this->user_model->getUserWithdrawalPointHistory($this->user_id);
        if ($current_withdrawal_point_value == null) {
            $this->msg("You have no point to withdraw...");
            redirect("user/earningReport");
        }

        if ($current_withdrawal_point_value < Min_Point_For_Withdraw) {
            $this->msg("Minimum 1 kp is required to convert to balance..");
            redirect("user/earningReport");
        }
        //add balance from user account
        $balance['user_id'] = $this->user_id;
        $balance['amount'] = $current_withdrawal_point_value * Per_Point_Rate;
        $balance['balance_type_id'] = $this->balance_model->getUserBalanceTypeIdByKey(Deposit);
        $balance['balance_source'] = $this->balance_model->getBalanceSourceIdByKey(Point_Exchange);

        //point exchange
        $point_exchange['user_id'] = $this->user_id;
        $point_exchange['amount'] = $balance['amount'];
        $point_exchange['point_exchange_type_id'] = $this->user_model->getPointExchangeId(Point_To_Money);

        //move point to another point total history table
        //update tbl_user_point and set all active in point to active 0

        $isSuccess = $this->user_model->userPointWithdraw($this->user_id, $balance, $point_exchange);
        if ($isSuccess) {

            $this->insertToCompanyBalance(($balance['amount'] * Vat_Percentage) / 100, $this->user_id, Company_Vat);
            $this->msg("Your point has been converted ..");
        } else {
            $this->msg("Failed ..");
        }

        redirect("user/earningReport");
    }

    /*
     * balance
     */
    public function userBalance()
    {
        $this->load->helper('user_helper');
        $data['other_member_bal_req'] = $this->balance_model->getOtherUserRequestedBalanceHistory($this->user_id);
        $data['my_member_bal_req'] = $this->balance_model->getMyUserRequestedBalanceHistory($this->user_id);
        $data['bal_req'] = $this->balance_model->getUserRequestedBalanceHistory($this->user_id);
        $data['bal_history'] = $this->balance_model->getUserBalanceHistory($this->user_id);
        $data['current_bal'] = $this->balance_model->getUserCurrentBalance($this->user_id);
        $data['content'] = $this->load->view('frontend/user_balance_history', $data, true);
        $this->load->view('frontend/index', $data);
    }

    public function balanceReq()
    {
        $req_to = $this->input->post('req_to', true);
        $trx_type_key = "";
        $data['user_id'] = $this->user_id;
        $data['request_amount'] = $this->input->post('request_amount', true);
        if ($req_to == Balance_Request_To_Admin) {
            $trx_type_key = $this->input->post('trx_type_id', true);
            $data['trx_type_id'] = $this->balance_model->getUserTrxTypeIdByKey($trx_type_key);
            $data['request_to'] = Balance_Request_To_Admin;
        } else if ($req_to == Balance_Request_To_Parent) {
            $data['trx_type_id'] = $this->balance_model->getUserTrxTypeIdByKey(Debit);
            $data['request_to'] = Balance_Request_To_Parent;
            $data['parent_req_id'] = $this->common_model->getParentUserIdByReferrerUserId($this->user_id);
        } else if ($req_to == Balance_Request_To_Any_Member) {
            $data['trx_type_id'] = $this->balance_model->getUserTrxTypeIdByKey(Debit);
            $data['request_to'] = Balance_Request_To_Any_Member;
            $data['parent_req_id'] = $this->input->post('user_id', true);
        } else {
            $this->msg("Sorry !");
            redirect("user/balanceReq");
        }

        if ($trx_type_key != null && $trx_type_key == Credit) {
            $c_balance = $this->balance_model->getUserCurrentBalance($this->user_id);
            if ($c_balance < $data['request_amount']) {
                $this->msg("Insufficient Balance !");
                redirect("user/userBalance");
            }
        }

        if (!empty($data['request_amount']) && is_numeric($data['request_amount'])) {
            $this->db->insert('tbl_user_balance_request', $data);
            $this->msg('Request Sent ! Waiting for approval !');
            //TODO send mail to admin/parent
        } else {
            $this->msg("Please Fill The Filed !");
        }
        redirect("user/userBalance");
    }

    public function providePinNumber($user_balance_req_id)
    {
        $data['balance_req_id'] = $user_balance_req_id;
        $data['content'] = $this->load->view('frontend/provide_pin_by_user', $data, true);
        $this->load->view('frontend/index', $data);
    }

    public function getBalanceByPinNumber()
    {
        $pinNumber = $this->input->post('pin_number', true);
        $user_balance_req_id = $this->input->post('user_balance_req_id', true);
        if ($pinNumber != null) {
            $pinIsValid = $this->common_model->checkPinNumber($pinNumber, $user_balance_req_id);
            if (!$pinIsValid) {
                $this->msg("Sorry Pin Number Doesn't Match !");
            } else {
                $this->addOrRemoveBalanceToUser($user_balance_req_id);
            }
        }
        redirect("user/userBalance");

    }

    private function depositToUserAccount($balanceReqDet)
    {
        $trx['user_trx_type_id'] = $this->balance_model->getUserTrxTypeIdByKey(Debit);

        $trx['amount'] = $balanceReqDet->request_amount;
        $trx['user_id'] = $balanceReqDet->user_id;
        return $trx;
    }

    private function withdrawFromUserAccount($balanceReqDet)
    {
        $trx['user_trx_type_id'] = $this->balance_model->getUserTrxTypeIdByKey(Credit);
        $trx['amount'] = $balanceReqDet->request_amount;
        $trx['user_id'] = $balanceReqDet->user_id;
        return $trx;
    }

    private function userBalanceHistory($balanceReqDet)
    {
        if ($balanceReqDet->trx_type_id == $this->balance_model->getUserBalanceTypeIdByKey(Credit)) {
            $b_history['balance_type_id'] = $this->balance_model->getUserBalanceTypeIdByKey(Withdraw);
            $b_history['amount'] = $balanceReqDet->request_amount;
        } else {
            $b_history['amount'] = $balanceReqDet->request_amount;
            $b_history['balance_type_id'] = $this->balance_model->getUserBalanceTypeIdByKey(Deposit);
        }

        $b_history['user_id'] = $balanceReqDet->user_id;
        $b_history['balance_source'] = $this->balance_model->getBalanceSourceIdByKey(Transaction);
        return $b_history;
    }

    private function addOrRemoveBalanceToUser($balanceReqId)
    {
        $balanceReqDet = $this->common_model->getUserBalanceReqDetails($balanceReqId);
        if ($balanceReqDet->trx_type_id == $this->balance_model->getUserBalanceTypeIdByKey(Debit)) {
            $trx = $this->depositToUserAccount($balanceReqDet);
        } else {
            $trx = $this->withdrawFromUserAccount($balanceReqDet);
        }
        $b_history = $this->userBalanceHistory($balanceReqDet);

        if (!empty($balanceReqDet->request_amount)) {

            $insert = $this->balance_model->userBalanceTrx($trx, $b_history);
            if ($insert) {
                if ($balanceReqDet->trx_type_id == $this->balance_model->getUserBalanceTypeIdByKey(Credit)) {
                    //     $this->insertToCompanyBalance(($balanceReqDet->request_amount * Vat_Percentage) / 100, $balanceReqDet->user_id, Company_Vat);
                } else if ($balanceReqDet->trx_type_id == $this->balance_model->getUserBalanceTypeIdByKey(Debit)) {
                    if ($balanceReqDet->request_to == Balance_Request_To_Admin) {
                        $this->insertToCompanyBalance(($balanceReqDet->request_amount * Com_Commission_Percentage) / 100, $balanceReqDet->user_id, Com_Commission);
                    } else if ($balanceReqDet->request_to == Balance_Request_To_Parent || $balanceReqDet->request_to == Balance_Request_To_Any_Member) {
                        $this->insertToBalanceHistory($balanceReqDet->parent_req_id, ($balanceReqDet->request_amount * Com_Commission_Percentage) / 100, Balance_Commission, Deposit);
                        $this->insertToBalanceHistory($balanceReqDet->user_id, ($balanceReqDet->request_amount * Com_Commission_Percentage) / 100, Balance_Commission, Withdraw);
                    }
                }

                $this->updateRequestStatus($balanceReqId, Approved);
                $this->msg('Request Completed..');
            } else {
                $this->msg('Failed');
            }
        } else {
            $this->msg('Problem in amount ...');
        }
        redirect('user/userBalance');
    }

    public function updateRequestStatus($balanceReqId, $status)
    {
        $this->db->set('request_status', $status)
            ->set('approved_by', $this->user_id)
            ->where('user_balance_request_id', $balanceReqId)
            ->update('tbl_user_balance_request');

    }

//generate pin by parent user
    public function proceedReq($balanceReqId, $parentId)
    {
        $cBalance = $this->balance_model->getUserCurrentBalance($parentId);
        $reqBalance = $this->common_model->getUserBalanceReqDetails($balanceReqId);
        if ($cBalance < $reqBalance->request_amount) {
            $this->msg("Insufficient Balance !");
            redirect("user/userBalance");
        } else {
            $data['balance_req_id'] = $balanceReqId;
            $data['content'] = $this->load->view('frontend/proceed_user_req', $data, true);
            $this->load->view('frontend/index', $data);
        }

    }

    public function proceedBalanceReq()
    {
        $user_balance_req_id = $this->input->post('user_balance_req_id', true);
        $pin = $this->input->post('pin_number', true);
        $balanceReqDet = $this->common_model->getUserBalanceReqDetails($user_balance_req_id);

        if (!empty($pin)) {
            $deduct['amount'] = $balanceReqDet->request_amount;
            $deduct['balance_type_id'] = $this->balance_model->getUserBalanceTypeIdByKey(Withdraw);
            $deduct['user_id'] = $balanceReqDet->parent_req_id;
            $deduct['balance_source'] = $this->balance_model->getBalanceSourceIdByKey(Transaction);
            $this->db->insert('tbl_balance_history', $deduct);
            $this->db->set('balance_pin', $pin)->where('user_balance_request_id', $user_balance_req_id)->update('tbl_user_balance_request');
            $this->updateRequestStatus($user_balance_req_id, Lock_by_Pin);
            $this->msg("Accept and Pin Number Created... Pin Number is : " . $pin);
            //for send email
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
        redirect("user/userBalance");

    }

    public function cancelRequest($user_balance_request_id = null)
    {
        if ($user_balance_request_id != null) {
            $this->db->set('request_status', Canceled)->where('user_balance_request_id', $user_balance_request_id)->update('tbl_user_balance_request');
            $this->msg("Request Cancelled");
            redirect("user/userBalance");
        } else {
            redirect("user/page_not_found");
        }

    }

    // transfer
    public function transfer()
    {
        $this->load->helper('user_helper');
        $data['transfer'] = $this->user_model->getTnsInfo($this->user_id);
        $data['content'] = $this->load->view('frontend/transfer', $data, true);
        $this->load->view('frontend/index', $data);
    }

    public function transferBalOrPoint()
    {
        $trnsType = $this->input->post('transfer_type', true);
        $amount = $this->input->post('transfer_amount', true);
        $receiver_id = $this->input->post('receiver_id', true);
        $cur_balance = $this->balance_model->getUserCurrentBalance($this->user_id);
        $cur_point = $this->user_model->getUserCurrentPointHistory($this->user_id);
        $transfer['transfered_amount'] = $amount;
        $transfer['user_id'] = $this->user_id;
        $transfer['receiver_id'] = $receiver_id;
        if (!empty($transfer['transfered_amount']) && !empty($receiver_id)) {

            if ($trnsType == Point) {
                if ($cur_point < $transfer['transfered_amount']) {
                    $this->msg("Insufficient Point ..");
                    redirect("user/transfer");
                }
                $transfer['transfer_type_id'] = $this->user_model->getTransferTypeIdByKey(Point);
                $this->db->insert('tbl_transfer', $transfer);
                $this->insertToUserPoint($transfer['transfered_amount'], $this->user_id, Point_Transfer, POINT_OUT);
                $this->insertToUserPoint($transfer['transfered_amount'], $receiver_id, Point_Transfer, POINT_IN);
                $this->msg($amount . " Point is transfer to the member.");
            } else if ($trnsType == Money) {
                if ($cur_balance < $transfer['transfered_amount']) {
                    $this->msg("Insufficient Balance ..");
                    redirect("user/transfer");
                }
                $transfer['transfer_type_id'] = $this->user_model->getTransferTypeIdByKey(Money);

                $this->db->insert('tbl_transfer', $transfer);
                $this->insertToBalanceHistory($this->user_id, $transfer['transfered_amount'], Transfer, Withdraw);
                $this->insertToBalanceHistory($receiver_id, $transfer['transfered_amount'], Transfer, Deposit);
                $this->msg($amount . " tk is transfer to the member.");
            } else {
                $this->msg("Sorry !");
            }
        } else {
            $this->msg("Required field is empty !");
        }


        redirect("user/transfer");
    }


    /*
     * end
     */

    public function changePassword()
    {
        $data['content'] = $this->load->view('frontend/change_password', "", true);
        $this->load->view('frontend/index', $data);
    }

    public function updatePassword()
    {
        $oldPass = $this->input->post('old_password', true);
        $password = $this->input->post('password', true);
        $rePassword = $this->input->post('re_password', true);
        $isCorrect = $this->db->select('password')->from('tbl_users')->where('user_id', $this->user_id)->get()->row();
        if ($isCorrect->password != md5($oldPass)) {
            $this->msg("Previous Password Doesn't match !!");
        } else {
            if ($password == $rePassword) {
                $this->db->set('password', md5($password))->where('user_id', $this->user_id)->update('tbl_users');
                $this->msg("Your Passwrod have been updated ! ");
            } else {
                $this->msg("Sorry ! Password doesn't match !");
            }

        }
        redirect("user/changePassword");
    }

//--------------- top News panel -----------------------------//

    public function top_news_info()
    {
        $total = $this->news_model->countScrollNewsByUser($this->user_id);
        $perPage = 20;
        $this->pagination(base_url("user/top_news_info/"), $perPage, $total);
        $data['top_news_info'] = $this->news_model->select_top_news_info($perPage, $this->uri->segment(3), $this->user_id);
        $data['content'] = $this->load->view('frontend/_top_news_list', $data, true);
        $this->load->view('frontend/index', $data);

    }

    public function add_top_news()
    {
        $data['content'] = $this->load->view('frontend/_add_top_news_info', "", true);
        $this->load->view('frontend/index', $data);
    }

    public function save_top_news()
    {

        $data = array();
        $data['top_news'] = $this->input->post('top_news', true);
        $data['user_id'] = $this->user_id;
        $this->db->insert('tbl_top_news', $data);
        $this->msg("Save Top News Information Successfully..!!!");
        redirect('user/add_top_news');

    }

    public function edit_top_news($top_news_id)
    {

        $data = array();
        $data['top_news_info'] = $this->news_model->select_top_news_by_id($top_news_id);
        $data['content'] = $this->load->view('frontend/_edit_top_news_info', $data, true);
        $this->load->view('frontend/index', $data);

    }

    public function update_top_news()
    {

        $data = array();
        $top_news_id = $this->input->post('top_news_id', true);
        $data['top_news'] = $this->input->post('top_news', true);
        $data['user_id'] = $this->user_id;
        //print_r($data);exit;
        $this->db->where('top_news_id', $top_news_id)->update('tbl_top_news', $data);

        $this->msg('Update Top News Information Successfully..!!!');
        redirect('user/top_news_info');

    }

    public function delete_top_news($top_news_id)
    {

        $this->db->where('top_news_id', $top_news_id)->delete('tbl_top_news');
        $this->msg('Delete Top News Information Successfully..!!!');

        redirect('user/top_news_info');
    }
//--------------- End top News panel -----------------------------//
//news section
    public function newsListByMember()
    {
        $total = $this->news_model->countNewsByUser($this->user_id);
        $perPage = 20;
        $this->pagination(base_url("user/newsListByMember/"), $perPage, $total);
        $data['news_info'] = $this->news_model->select_news_info($perPage, $this->uri->segment(3), $this->user_id);
        $data['content'] = $this->load->view('frontend/_news_list', $data, true);
        $this->load->view('frontend/index', $data);
    }


    public function addNews()
    {
        $data['content'] = $this->load->view('frontend/_add_news', "", true);
        $this->load->view('frontend/index', $data);
    }


    public function save_news_info()
    {
        $newsId = $this->news_model->get_all_news_id();
        $data = array();
        $data['news_guid'] = "N" . ($newsId + 1);
        $data['user_id'] = $this->user_id;
        $data['news_cat_id'] = $this->input->post('news_cat_id', true);
        $data['news_headline'] = $this->input->post('news_headline', true);
        $data['news_details'] = $this->input->post('news_details', true);
        $data['news_unique_msg'] = $this->input->post('news_unique_msg', true);
        $data['news_top_page_status'] = $this->input->post('news_top_page_status', true);

        /*image upload*/
        $config['upload_path'] = './assets/frontend/np/images/news/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = false;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('filePic')) {
            $error = $this->upload->display_errors();
            $this->msg($error);
            redirect("user/addNews");
        }
        $uploadImage = $this->upload->data();
        if ($uploadImage['is_image'] == 1)
            $data['news_image'] = $uploadImage['file_name'];
        else {
            $this->msg("Invalid File Type");
        }

        $this->news_model->save_news_info($data);
        $this->msg("Save News Information Successfully..!!!");
        redirect('user/addNews');
    }

    public function edit_news_info($news_id)
    {
        $data = array();
        $data['news_data'] = $this->news_model->select_news_info_by_id($news_id);
        $data['content'] = $this->load->view('frontend/_edit_news', $data, true);
        $this->load->view('frontend/index', $data);
    }

    public function update_news_info()
    {
        $data = array();
        $news_id = $this->input->post('news_id', true);
        $data['news_cat_id'] = $this->input->post('news_cat_id', true);
        $data['news_headline'] = $this->input->post('news_headline', true);
        $data['news_details'] = $this->input->post('news_details', true);
        $data['news_unique_msg'] = $this->input->post('news_unique_msg', true);
        $data['news_top_page_status'] = $this->input->post('news_top_page_status', true);
        /*image upload*/
        $config['upload_path'] = './assets/frontend/np/images/news/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = false;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('filePic')) {
//            $error = $this->upload->display_errors();
//            $this->msg($error);
//            redirect("user/addNews");
        } else {
            $uploadImage = $this->upload->data();
            if ($uploadImage['is_image'] == 1)
                $data['news_image'] = $uploadImage['file_name'];
            else {
                $this->msg("Invalid File Type");
            }
        }
        $this->news_model->update_news_info($data, $news_id);
        $this->msg('Update News Information Successfully..!!!');
        redirect('user/newsListByMember');
    }

    public function inactive_news_info($id)
    {
        $this->db->set('news_status', 0)->where("news_id", $id)->update('kha_news_info');
        redirect("user/newsListByMember");
    }

    public function active_news_info($id)
    {
        $this->db->set('news_status', 1)->where("news_id", $id)->update('kha_news_info');
        redirect("user/newsListByMember");
    }

    public function logout()
    {
        session_destroy();
        redirect("home");
    }


}