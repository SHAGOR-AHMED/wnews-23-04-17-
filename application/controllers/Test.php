<?php

/**
 * Created by PhpStorm.
 * User: arifk
 * Date: 16/02/2017
 * Time: 11:55 PM
 */
class Test extends CI_Controller
{
    public function testEmail()
    {
        $data['from_address'] = "arifkhan0713@gmail.com";
        $data['to_address'] = "arifkhan0713@hotmail.com";
        $data['full_name'] = "Rashed Khan Arif";
        $data['subject'] = "Test Email";
        $data['message'] = "Message .....";
        $this->mailer_model->sendEmail($data, "confirm_activation_email");
        echo "Sent";

    }

    public function testFileRealTimeDownload()
    {
        $this->load->helper('download');
        //set the textfile's content
        $data = "8800000005";
        //set the textfile's name
        $name = 'referenceID.txt';
        //use this function to force the session/browser to download the created file
        force_download($name, $data);

    }

    public function testView()
    {
        $this->load->view('test');
    }

    public function newsPost()
    {

    }

    public function read()
    {
        $this->load->model('point_model');
        $point = $this->point_model->get_point_value();

//TODO post user id will be get from newspaper site database now this is the demo id
        $post_user_id = 10;
        //deduct point to the user who read the news
        foreach ($point as $item) {
            if ($item->point_type_key == News_Read_Deduct_Kp_From_Read_Person && $item->active == 1) {
                $read_deduct_point['point_value'] = $item->point_value;
                $read_deduct_point['incoming_point_type_id'] = $item->point_type_id;
                break;
            }
        }
        $read_deduct_point['user_id'] = $this->session->userdata('user_id');
        $read_deduct_point['io_status'] = POINT_OUT;
        //end
        //add point to post user
        foreach ($point as $item) {
            if ($item->point_type_key == News_Read_Add_kp_to_post_Person && $item->active == 1) {
                $read_add_point['point_value'] = $item->point_value;
                $read_add_point['incoming_point_type_id'] = $item->point_type_id;
                break;
            }
        }
        $read_add_point['user_id'] = $post_user_id;
        $read_add_point['io_status'] = POINT_IN;
        $this->db->trans_start();
        $this->db->insert('tbl_user_point', $read_deduct_point);
        $this->db->insert('tbl_user_point', $read_add_point);
        $this->db->trans_complete();
        if ($this->db->trans_status() == false) {
            echo "Failed";
        } else {
            echo "Success";
        }

    }

    public function like()
    {

    }

    public function unlike()
    {
    }

    public function comment()
    {

    }

    public function numFormat()
    {
        $n = 2200;
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

    public function apiTest()
    {
        $data['a'] = "Arif";
        $data['b'] = "khan";
        echo json_encode($data);
    }
}