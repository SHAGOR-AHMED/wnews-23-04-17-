<?php

class Mailer_model extends CI_Model
{
    private $from_address = "arifkhan0713@gmail.com";
    private $admin_address = "arifkhan0713@hotmail.com";

    function sendEmail($data, $templateName)
    {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($this->from_address, $data['subject']);
        $this->email->to($data['to_address']);
        //$this->email->cc($data['cc_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mail_scripts/' . $templateName, $data, true);

        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

    function userWelcomeEmail($data, $templateName)
    {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($this->from_address, $data['subject']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mail_scripts/' . $templateName, $data, true);
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

    function sendAccountConfirmEmail($data, $templateName)
    {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($this->from_address, $data['subject']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mail_scripts/' . $templateName, $data, true);
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

    function sendPinNumberEmail($data, $templateName)
    {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($this->from_address, $data['subject']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mail_scripts/' . $templateName, $data, true);
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

    function sendPasswordResetLink($link, $email, $templateName)
    {
        $data['link']=$link;
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($this->from_address, "Password Reset");
        $this->email->to($email);
        $this->email->subject("Password Reset");
        $body = $this->load->view('mail_scripts/' . $templateName, $data, true);
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

    public function userWelcomeEmailToAdmin($full_name)
    {
        $this->load->library('email');
        $this->email->set_mailtype('text');
        $this->email->from($this->from_address, "New Member");
        $this->email->to($this->admin_address);
        $this->email->subject("New Member");
        $body = $full_name . " has been registered ...";
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }
}


?>
