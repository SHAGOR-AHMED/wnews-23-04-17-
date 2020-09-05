<?php
if (!defined('BASEPATH')) die('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 10/02/2017
 * Time: 12:05 AM
 */
class Home extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (isset($this->user_id)) {
            if ($this->isAuth() && $this->role == USER)
                redirect('user');
            else
                redirect("control_panel");
        }
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['content'] = $this->load->view('frontend/home', '', true);
        $this->load->view('frontend/index', $data);
    }

    /*
         * check the user data to login
         */
    public function checkUserLogin()
    {
        $userId = $this->input->post('reference_id', true);
        $pass = md5($this->input->post('password', true));
        $user = $this->user_model->check_user_login_info($userId, $pass);
        if (count($user) > 0 && $user != null) {
            $data['ref_id'] = $user->reference_id;
            $data['user_id'] = $user->user_id;
            $data['full_name'] = $user->full_name;
            $data['u_image'] = $user->u_image;
            $data['role'] = $user->role;
            $this->session->set_userdata($data);
            redirect('user');
        }
        $this->msg('Wrong Information');
        redirect('home');
    }

    public function registration()
    {
        $this->load->helper('user_helper');
        $data['content'] = $this->load->view('frontend/user_reg', '', true);
        $this->load->view('frontend/index', $data);
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

    public function checkEmail()
    {
        $email = $this->input->post('email', true);
        $chkEmail = $this->db->select('email,user_id')->from('tbl_users')->where('email', $email)->get()->row();
        if ($chkEmail != null) {
            $link = base_url("home/resetPassword/" . ($this->encrypt->encode($chkEmail->user_id)));
            $this->mailer_model->sendPasswordResetLink($link, $email, "password_reset_link");
            $this->msg("Check your email ....");
            redirect("home");
        }
        $this->msg("Email not found !");
        redirect("home");
    }

    //this link browse from email
    public function resetPassword($userId = null)
    {
        $this->load->model('common_model');
        if ($userId != null) {
            $id = $this->encrypt->decode($userId);
            $check = $this->common_model->checkUserId($id);
            if (!$check) {
                $this->msg("Invalid !!!");
                redirect("home");
            }
            $data['user_id'] = $id;
            $data['content'] = $this->load->view('frontend/reset_password', $data, true);
            $this->load->view('frontend/index', $data);
        }
    }

    public function updatePassword()
    {
        $userId = $this->input->post('user_id', true);
        $password = $this->input->post('password', true);
        $rePassword = $this->input->post('re_password', true);
        if ($password == $rePassword) {
            $this->db->set('password', md5($password))->where('user_id', $userId)->update('tbl_users');
            $this->msg("Your Passwrod have been updated ! ");
        } else {
            $this->msg("Sorry ! Password doesn't match !");
        }
        redirect("home");

    }
}